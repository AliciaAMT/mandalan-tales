import { Injectable, inject, signal, computed, Signal, runInInjectionContext, Injector } from '@angular/core';
import { CharacterService } from './character.service';
import { DialogueTree, DialogueNode, DialogueOption, DialogueState, NPC_DIALOGUES } from '../models/dialogue.model';
import { Flags } from '../models/flags.model';
import { CharStats } from '../models/charstats.model';

@Injectable({
  providedIn: 'root'
})
export class DialogueService {
  private characterService = inject(CharacterService);
  private injector = inject(Injector);

  // Dialogue state
  private dialogueState = signal<DialogueState>({
    currentNpcId: undefined,
    currentNodeId: undefined,
    dialogueHistory: [],
    isOpen: false
  });

  // Computed values
  public readonly isDialogueOpen = computed(() => this.dialogueState().isOpen);
  public readonly currentDialogue = computed(() => {
    const state = this.dialogueState();
    if (!state.currentNpcId) return null;
    return NPC_DIALOGUES[state.currentNpcId];
  });
  public readonly currentNode = computed(() => {
    const state = this.dialogueState();
    const dialogue = this.currentDialogue();
    if (!dialogue || !state.currentNodeId) return null;
    return dialogue.nodes.find(node => node.id === state.currentNodeId);
  });

  constructor() {}

    /**
   * Start a dialogue with an NPC
   */
  async startDialogue(npcId: string): Promise<boolean> {
    const dialogue = NPC_DIALOGUES[npcId];
    if (!dialogue) {
      console.warn(`Dialogue not found for NPC: ${npcId}`);
      return false;
    }

    // Determine the starting node based on game state
    const startNodeId = await this.determineStartNode(npcId, dialogue);

    this.dialogueState.set({
      currentNpcId: npcId,
      currentNodeId: startNodeId,
      dialogueHistory: [],
      isOpen: true
    });

    return true;
  }

  /**
   * Select a dialogue option
   */
  selectOption(optionId: string): void {
    const currentNode = this.currentNode();
    if (!currentNode) return;

    const option = currentNode.options.find(opt => opt.id === optionId);
    if (!option) return;

    // Track if a level up will occur
    let willLevelUp = false;
    if (option.consequences) {
      willLevelUp = option.consequences.some(c => c.type === 'level_up');
    }

    // Process consequences
    if (option.consequences) {
      this.processConsequences(option.consequences).then(() => {
        // After processing, if a level up occurred, re-evaluate the node
        if (willLevelUp) {
          // Force update by resetting currentNodeId to itself
          this.dialogueState.update(state => ({
            ...state,
            currentNodeId: state.currentNodeId
          }));
        }
      });
    }

    // Handle action
    if (option.action === 'close') {
      this.closeDialogue();
      return;
    }

    if (option.action === 'random_advice') {
      // Update the current node with random advice
      const dialogue = this.currentDialogue();
      if (dialogue) {
        const randomAdviceNode = dialogue.nodes.find(node => node.id === 'random_advice');
        if (randomAdviceNode) {
          randomAdviceNode.npcText = this.getRandomAdvice();
        }
      }
    }

    // Handle level up success message
    if (option.nextDialogueId === 'level_up_success') {
      const character = this.characterService.getCurrentCharacter();
      if (character) {
        const dialogue = this.currentDialogue();
        if (dialogue) {
          const levelUpNode = dialogue.nodes.find(node => node.id === 'level_up_success');
          if (levelUpNode) {
            levelUpNode.npcText = this.getLevelUpMessage(character.level);
          }
        }
      }
    }

    // Move to next dialogue node
    if (option.nextDialogueId) {
      this.dialogueState.update(state => ({
        ...state,
        currentNodeId: option.nextDialogueId,
        dialogueHistory: [...state.dialogueHistory, option.text]
      }));
    }
  }

  /**
   * Close the current dialogue
   */
  closeDialogue(): void {
    this.dialogueState.set({
      currentNpcId: undefined,
      currentNodeId: undefined,
      dialogueHistory: [],
      isOpen: false
    });
  }

  /**
   * Determine the starting node based on game state
   */
  private async determineStartNode(npcId: string, dialogue: DialogueTree): Promise<string> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return dialogue.startNodeId;

    try {
      // Get character flags - this is already wrapped in runInInjectionContext in CharacterService
      const flags = await this.characterService.getCharacterFlags(character.name);

      // Father NPC logic based on old demo
      if (npcId === 'father') {
        // Check for quest4 completion
        if (flags?.quest4 === 1) {
          return 'quest4_complete';
        }

        // Check for shep feeding states
        if (flags?.shepfeed === 2) {
          return 'found_key';
        }
        if (flags?.shepfeed === 1) {
          return 'shep_fed';
        }

        // Check quest1 state
        if (flags?.quest1 === 2) {
          return 'advice_options';
        }
        if (flags?.quest1 === 1) {
          return 'change_mind';
        }

        // Default to initial dialogue
        return 'initial';
      }

      // Default to start node
      return dialogue.startNodeId;
    } catch (error) {
      console.error('Error determining start node:', error);
      // Fallback to start node on error
      return dialogue.startNodeId;
    }
  }

  /**
   * Process dialogue consequences
   */
  private async processConsequences(consequences: any[]): Promise<void> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return;

    try {
      await runInInjectionContext(this.injector, async () => {
        for (const consequence of consequences) {
          switch (consequence.type) {
            case 'set_flag':
              await this.setCharacterFlag(character.id!, consequence.key, consequence.value);
              break;
            case 'add_experience':
              await this.addExperience(character.id!, consequence.value);
              break;
            case 'add_gold':
              await this.addGold(character.id!, consequence.value);
              break;
            case 'add_item':
              await this.addItem(character.id!, consequence.key, consequence.value);
              break;
            case 'level_up':
              await this.levelUpCharacter(character.id!);
              break;
            // Add more consequence types as needed
          }
        }
      });
    } catch (error) {
      console.error('Error processing dialogue consequences:', error);
    }
  }

  /**
   * Get character flags
   */
  private getCharacterFlags(characterId: string): Flags | null {
    // This should be implemented in CharacterService
    // For now, return null
    return null;
  }

  /**
   * Set a character flag
   */
  private async setCharacterFlag(characterId: string, key: string, value: any): Promise<void> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return;

    try {
      await this.characterService.setCharacterFlag(character.name, key as any, value);
    } catch (error) {
      console.error('Error setting character flag:', error);
      throw error; // Re-throw to let the calling method handle it
    }
  }

  /**
   * Add experience to character
   */
  private async addExperience(characterId: string, amount: number): Promise<void> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return;

    try {
      const newExperience = character.experience + amount;
      await this.characterService.updateCharacter(characterId, {
        experience: newExperience
      });
    } catch (error) {
      console.error('Error adding experience:', error);
      throw error; // Re-throw to let the calling method handle it
    }
  }

  /**
   * Add gold to character
   */
  private async addGold(characterId: string, amount: number): Promise<void> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return;

    try {
      const newGold = character.gold + amount;
      await this.characterService.updateCharacter(characterId, {
        gold: newGold
      });
    } catch (error) {
      console.error('Error adding gold:', error);
      throw error; // Re-throw to let the calling method handle it
    }
  }

  /**
   * Add item to character inventory
   */
  private async addItem(characterId: string, itemKey: string, quantity: number): Promise<void> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return;

    try {
      // Import the inventory service to add items
      const { InventoryService } = await import('./inventory.service');
      const inventoryService = this.injector.get(InventoryService);

      // Create the item based on the key
      let item;
      switch (itemKey) {
        case 'letter':
          item = inventoryService.createBasicItem(
            'Letter from Solias',
            'This letter is your invitation to the House of Elders. The guards should let you enter when you show them this letter.',
            'Other',
            'letter',
            1,
            { itemrarity: 'Relic', itemlevel: 1, othertype: 'Quest' }
          );
          break;
        default:
          console.warn(`Unknown item key: ${itemKey}`);
          return;
      }

      // Add the item to inventory
      await inventoryService.addItem(item);
    } catch (error) {
      console.error('Error adding item:', error);
      throw error; // Re-throw to let the calling method handle it
    }
  }

  /**
   * Level up character
   */
  private async levelUpCharacter(characterId: string): Promise<void> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return;

    try {
      const currentLevel = character.level;
      const newLevel = currentLevel + 1;

      // Base stat increases for all levels
      const baseUpdates: any = {
        level: newLevel,
        skillPoints: character.skillPoints + 3,
        maxLife: character.maxLife + 3,
        life: character.maxLife + 3, // Heal to full on level up
        maxMana: character.maxMana + 3,
        mana: character.maxMana + 3 // Restore mana to full on level up
      };

      // Level-specific stat increases based on original demo
      switch (currentLevel) {
        case 1: // Level 1 -> 2
          baseUpdates.strength = character.strength + 2;
          baseUpdates.agility = character.agility + 2;
          baseUpdates.speed = character.speed + 2;
          break;
        case 2: // Level 2 -> 3
          baseUpdates.accuracy = character.accuracy + 2;
          baseUpdates.wisdom = character.wisdom + 2;
          baseUpdates.luck = character.luck + 2;
          break;
        case 3: // Level 3 -> 4
          // Only skill points, life, and mana (no stat increases)
          break;
        case 4: // Level 4 -> 5
        case 5: // Level 5 -> 6
        case 6: // Level 6 -> 7
        case 7: // Level 7 -> 8
        case 8: // Level 8 -> 9
        case 9: // Level 9 -> 10
          // +1 to all stats
          baseUpdates.strength = character.strength + 1;
          baseUpdates.agility = character.agility + 1;
          baseUpdates.speed = character.speed + 1;
          baseUpdates.accuracy = character.accuracy + 1;
          baseUpdates.wisdom = character.wisdom + 1;
          baseUpdates.luck = character.luck + 1;
          break;
        default:
          // Level 10+ - no more level ups from Father
          console.warn(`Character is already at maximum level (${currentLevel})`);
          return;
      }

      await this.characterService.updateCharacter(characterId, baseUpdates);
    } catch (error) {
      console.error('Error leveling up character:', error);
      throw error; // Re-throw to let the calling method handle it
    }
  }

  /**
   * Get available options for current node
   */
  getAvailableOptions(): DialogueOption[] {
    const currentNode = this.currentNode();
    if (!currentNode) return [];

    return currentNode.options.filter(option => {
      // Check requirements
      if (option.requirements) {
        return this.checkRequirements(option.requirements);
      }
      return true;
    });
  }

  /**
   * Check if requirements are met
   */
  private checkRequirements(requirements: any[]): boolean {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return false;

    for (const requirement of requirements) {
      switch (requirement.type) {
        case 'level':
          if (requirement.operator === 'greater') {
            if (character.level <= requirement.value) return false;
          } else {
            if (character.level < requirement.value) return false;
          }
          break;
        case 'experience':
          if (requirement.operator === 'less') {
            if (character.experience >= requirement.value) return false;
          } else {
            if (character.experience < requirement.value) return false;
          }
          break;
        case 'flag':
          // This would need to be implemented with actual flag checking
          break;
        case 'item':
          // This would need to be implemented with inventory checking
          break;
      }
    }
    return true;
  }

  /**
   * Get random advice for Father NPC
   */
  getRandomAdvice(): string {
    const advice = [
      'Remember to stock up on plenty of food for the journey.',
      'Could you check on the dog? I think I forgot to feed poor old Shep.',
      'Make sure you arm yourself before you leave. The trail is full of dangerous animals and goblin bandits. These are dangerous times.',
      'Old lady Marah who lives just down the road has some nice recipes I would like to have from her.',
      'Remember if you are ever in trouble you are welcome back home anytime!',
      'I saw a rat near the kitchen table this morning, but it got away before I could get rid of it. It will probably come back when we aren\'t looking.'
    ];

    return advice[Math.floor(Math.random() * advice.length)];
  }

  /**
   * Get level up success message based on current level
   */
  private getLevelUpMessage(currentLevel: number): string {
    const newLevel = currentLevel + 1;
    switch (currentLevel) {
      case 1: // Level 1 -> 2
        return `Yes, my child, I think you are ready to learn more. You are now level ${newLevel}. Congratulations! You have gained 2 strength, 2 agility, and 2 speed. Don't forget to use your 3 new skill points either!`;
      case 2: // Level 2 -> 3
        return `Yes, my child, I think you are ready to learn more. You are now level ${newLevel}. Congratulations! You have gained 2 accuracy, 2 wisdom, and 2 luck. Don't forget to use your 3 new skill points either!`;
      case 3: // Level 3 -> 4
        return `Yes, my child, I think you are ready to learn more. You are now level ${newLevel}. Congratulations! You have gained 3 skillpoints.`;
      case 4: // Level 4 -> 5
        return `Yes, my child, I think you are ready to learn more. You are now level ${newLevel}. Congratulations! You have gained 1 to all stats and 3 skillpoints.`;
      case 5: // Level 5 -> 6
      case 6: // Level 6 -> 7
      case 7: // Level 7 -> 8
      case 8: // Level 8 -> 9
      case 9: // Level 9 -> 10
        return `Yes, my child, I think you are ready to learn more. You are now level ${newLevel}. Congratulations!`;
      default:
        return `Yes, my child, I think you are ready to learn more. You are now level ${newLevel}. Congratulations!`;
    }
  }
}
