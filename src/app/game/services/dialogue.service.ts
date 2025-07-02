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

    // Process consequences
    if (option.consequences) {
      this.processConsequences(option.consequences);
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
   * Level up character
   */
  private async levelUpCharacter(characterId: string): Promise<void> {
    const character = this.characterService.getCurrentCharacter();
    if (!character) return;

    try {
      // Simple level up logic - you might want to make this more sophisticated
      const newLevel = character.level + 1;
      const newSkillPoints = character.skillPoints + 3;

      await this.characterService.updateCharacter(characterId, {
        level: newLevel,
        skillPoints: newSkillPoints
      });
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
          if (character.level < requirement.value) return false;
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
}
