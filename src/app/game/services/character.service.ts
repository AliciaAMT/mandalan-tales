import { Injectable, inject, signal, computed, Signal, effect } from '@angular/core';
import { Firestore, collection, collectionData, query, where, addDoc, doc, updateDoc, deleteDoc, writeBatch } from '@angular/fire/firestore';
import { CharStats } from '../models/charstats.model';
import { Inventory, DEFAULT_INVENTORY } from '../models/inventory.model';
import { Skills, DEFAULT_SKILLS } from '../models/skills.model';
import { Cookbook, DEFAULT_COOKBOOK } from '../models/cookbook.model';
import { Enemy, DEFAULT_ENEMY } from '../models/enemy.model';
import { Counters, DEFAULT_COUNTERS } from '../models/counters.model';
import { Flags, DEFAULT_FLAGS } from '../models/flags.model';
import { Spellbook, DEFAULT_SPELLBOOK } from '../models/spellbook.model';
import { toSignal } from '@angular/core/rxjs-interop';
import { AuthService } from '../../services/auth.service';
import { CharacterDeletionService } from './character-deletion.service';

@Injectable({
  providedIn: 'root'
})
export class CharacterService {
  private firestore: Firestore = inject(Firestore);
  private authService: AuthService = inject(AuthService);
  private characterDeletionService: CharacterDeletionService = inject(CharacterDeletionService);

  // Create a signal for the current user
  private currentUserSignal = signal(this.authService.getCurrentUser()?.uid || '');

  // Use toSignal to convert Firestore observable to signal with user filtering
  private charactersSignal = toSignal(
    collectionData(
      query(
        collection(this.firestore, 'charstats'),
        where('userId', '==', this.currentUserSignal())
      ),
      { idField: 'id' }
    ) as any,
    { initialValue: [] as CharStats[] }
  ) as Signal<CharStats[]>;

  // Expose as readonly signal
  characters = this.charactersSignal;

  constructor() {
    // Update user signal when auth state changes
    effect(() => {
      const user = this.authService.getCurrentUser();
      this.currentUserSignal.set(user?.uid || '');
    });
  }

  // Computed values for filtered characters
  getCharacters(): CharStats[] {
    return this.characters();
  }

  // Helper method to get character by ID
  getCharacterById(id: string): CharStats | undefined {
    return this.characters().find((char: CharStats) => char.id === id);
  }

  // Method to check if character name already exists
  async isCharacterNameTaken(characterName: string): Promise<boolean> {
    const currentUser = this.authService.getCurrentUser();
    if (!currentUser) {
      throw new Error('User not authenticated');
    }

    const characters = this.characters();
    return characters.some(char => char.name.toLowerCase() === characterName.toLowerCase());
  }

  // Method to create a new character with all associated data
  async createCharacter(characterData: CharStats): Promise<string> {
    const currentUser = this.authService.getCurrentUser();
    if (!currentUser) {
      throw new Error('User not authenticated');
    }

    // Check if character name already exists
    const nameExists = await this.isCharacterNameTaken(characterData.name);
    if (nameExists) {
      throw new Error('Character name already exists');
    }

    const characterWithUserId = {
      ...characterData,
      userId: currentUser.uid
    };

    // Use a batch to create all character-related documents atomically
    const batch = writeBatch(this.firestore);

    // 1. Create the main character record
    const charRef = doc(collection(this.firestore, 'charstats'));
    batch.set(charRef, characterWithUserId);

    // 2. Create starting inventory items (matching old demo)
    // Rat Tail
    const ratTailRef = doc(collection(this.firestore, 'inventory'));
    const ratTailData: Inventory = {
      ...DEFAULT_INVENTORY,
      charname: characterData.name,
      itemname: 'Rat Tail',
      itemdescription: 'Rat tails are common ingredients in potions and enchantments.',
      itemtype: 'Other',
      itemimage: 'rattail',
      itemlevel: 1,
      itemrarity: 'Common',
      itemvalue: 0,
      keep: 1,
      othertype: 'Reagent'
    };
    batch.set(ratTailRef, ratTailData);

    // Lockpick
    const lockpickRef = doc(collection(this.firestore, 'inventory'));
    const lockpickData: Inventory = {
      ...DEFAULT_INVENTORY,
      charname: characterData.name,
      itemname: 'Lockpick',
      itemdescription: 'Lockpicks can be used on most locks that do not require special keys.',
      itemtype: 'Other',
      itemimage: 'lockpick',
      itemlevel: 1,
      itemrarity: 'Common',
      itemvalue: 0,
      keep: 1,
      othertype: 'Tool'
    };
    batch.set(lockpickRef, lockpickData);

    // 3. Create skills record
    const skillsRef = doc(collection(this.firestore, 'skills'));
    const skillsData: Skills = {
      ...DEFAULT_SKILLS,
      charname: characterData.name
    };
    batch.set(skillsRef, skillsData);

    // 4. Create cookbook record
    const cookbookRef = doc(collection(this.firestore, 'cookbook'));
    const cookbookData: Cookbook = {
      ...DEFAULT_COOKBOOK,
      charname: characterData.name
    };
    batch.set(cookbookRef, cookbookData);

    // 5. Create enemy record
    const enemyRef = doc(collection(this.firestore, 'enemy'));
    const enemyData: Enemy = {
      ...DEFAULT_ENEMY,
      charname: characterData.name
    };
    batch.set(enemyRef, enemyData);

    // 6. Create counters record
    const countersRef = doc(collection(this.firestore, 'counters'));
    const countersData: Counters = {
      ...DEFAULT_COUNTERS,
      charname: characterData.name
    };
    batch.set(countersRef, countersData);

    // 7. Create flags record
    const flagsRef = doc(collection(this.firestore, 'flags'));
    const flagsData: Flags = {
      ...DEFAULT_FLAGS,
      charname: characterData.name
    };
    batch.set(flagsRef, flagsData);

    // 8. Create spellbook record (empty for new characters)
    const spellbookRef = doc(collection(this.firestore, 'spellbook'));
    const spellbookData: Spellbook = {
      ...DEFAULT_SPELLBOOK,
      charname: characterData.name
    };
    batch.set(spellbookRef, spellbookData);

    // Commit all changes atomically
    await batch.commit();

    return charRef.id;
  }

  // Method to update an existing character
  async updateCharacter(characterId: string, updates: Partial<CharStats>): Promise<void> {
    const docRef = doc(this.firestore, 'charstats', characterId);
    await updateDoc(docRef, {
      ...updates,
      updatedAt: Date.now()
    });
  }

  // Method to delete a character (now uses comprehensive deletion)
  async deleteCharacter(characterId: string): Promise<void> {
    const currentUser = this.authService.getCurrentUser();
    if (!currentUser) {
      throw new Error('User not authenticated');
    }

    // Verify the character belongs to the current user
    const character = this.getCharacterById(characterId);
    if (!character || character.userId !== currentUser.uid) {
      throw new Error('Character not found or access denied');
    }

    // Use the comprehensive deletion service
    await this.characterDeletionService.deleteCharacterCompletely(characterId, character.name);
  }

  // Method to refresh characters when user changes
  refreshCharacters(): void {
    // The signal will automatically update when the user changes
    // due to the reactive query
  }
}
