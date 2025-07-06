import { Injectable, inject, signal, computed, Signal, effect, runInInjectionContext, Injector } from '@angular/core';
import { Firestore, collection, collectionData, query, where, addDoc, doc, updateDoc, deleteDoc, writeBatch, getDocs } from '@angular/fire/firestore';
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
  private injector = inject(Injector);
  private authService: AuthService = inject(AuthService);
  private characterDeletionService: CharacterDeletionService = inject(CharacterDeletionService);

  // Simple signal to hold characters
  private charactersSignal = signal<CharStats[]>([]);
  characters = this.charactersSignal.asReadonly();

  constructor() {
    // Set up effect to load characters when auth is ready
    effect(() => {
      console.log('CharacterService effect triggered:', {
        authInitialized: this.authService.authInitialized(),
        user: this.authService.user() ? 'User exists' : 'No user'
      });

      if (this.authService.authInitialized() && this.authService.user()) {
        console.log('Loading characters for user:', this.authService.user()?.uid);
        this.loadCharacters();
      } else {
        // Clear characters when not authenticated
        console.log('Clearing characters - not authenticated');
        this.charactersSignal.set([]);
      }
    });
  }

  private async loadCharacters(): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const currentUser = this.authService.getCurrentUser();
      console.log('loadCharacters called, currentUser:', currentUser?.uid);

      if (!currentUser) {
        console.log('No current user, clearing characters');
        this.charactersSignal.set([]);
        return;
      }

      try {
        const firestore = inject(Firestore);
        const charactersQuery = query(
          collection(firestore, 'charstats'),
          where('userId', '==', currentUser.uid)
        );

        console.log('Querying Firestore for characters with userId:', currentUser.uid);
        const characters$ = collectionData(charactersQuery, { idField: 'id' });

        // Use subscription instead of toSignal
        characters$.subscribe((characters: any) => {
          console.log('Loaded characters:', characters.length);
          // Cast the characters to CharStats[] type
          this.charactersSignal.set(characters as CharStats[]);
        });
      } catch (error) {
        console.error('Error loading characters:', error);
        this.charactersSignal.set([]);
      }
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

  // Helper method to get current character (first character for now)
  getCurrentCharacter(): CharStats | undefined {
    const characters = this.characters();
    return characters.length > 0 ? characters[0] : undefined;
  }

  // Method to check if character name already exists
  async isCharacterNameTaken(characterName: string): Promise<boolean> {
    return runInInjectionContext(this.injector, async () => {
      const currentUser = this.authService.getCurrentUser();
      if (!currentUser) {
        throw new Error('User not authenticated');
      }

      const characters = this.characters();
      return characters.some(char => char.name.toLowerCase() === characterName.toLowerCase());
    });
  }

  // Method to create a new character with all associated data
  async createCharacter(characterData: CharStats): Promise<string> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore); // Declare once at the top
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
      const batch = writeBatch(firestore);

      // 1. Create the main character record
      const charRef = doc(collection(firestore, 'charstats'));
      batch.set(charRef, characterWithUserId);

      // 2. Create starting inventory items (matching old demo)
      // Rat Tail
      const ratTailRef = doc(collection(firestore, 'inventory'));
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
      const lockpickRef = doc(collection(firestore, 'inventory'));
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
      const skillsRef = doc(collection(firestore, 'skills'));
      const skillsData: Skills = {
        ...DEFAULT_SKILLS,
        charname: characterData.name
      };
      batch.set(skillsRef, skillsData);

      // 4. Create cookbook record
      const cookbookRef = doc(collection(firestore, 'cookbook'));
      const cookbookData: Cookbook = {
        ...DEFAULT_COOKBOOK,
        charname: characterData.name
      };
      batch.set(cookbookRef, cookbookData);

      // 5. Create enemy record
      const enemyRef = doc(collection(firestore, 'enemy'));
      const enemyData: Enemy = {
        ...DEFAULT_ENEMY,
        charname: characterData.name
      };
      batch.set(enemyRef, enemyData);

      // 6. Create counters record
      const countersRef = doc(collection(firestore, 'counters'));
      const countersData: Counters = {
        ...DEFAULT_COUNTERS,
        charname: characterData.name
      };
      batch.set(countersRef, countersData);

      // 7. Create flags record
      const flagsQuery = query(
        collection(firestore, 'flags'),
        where('charname', '==', characterData.name),
        where('userId', '==', currentUser.uid)
      );
      const flagsSnapshot = await getDocs(flagsQuery);
      if (flagsSnapshot.empty) {
        const flagsRef = doc(collection(firestore, 'flags'));
        const flagsData: Flags = {
          ...DEFAULT_FLAGS,
          charname: characterData.name,
          userId: currentUser.uid
        };
        batch.set(flagsRef, flagsData);
        console.log(`Creating new flags document for character: ${characterData.name} and user: ${currentUser.uid}`);
      } else {
        // Reset existing flags to 0
        const flagsDoc = flagsSnapshot.docs[0];
        const resetFlags: Partial<Flags> = {
          ...DEFAULT_FLAGS,
          charname: characterData.name,
          userId: currentUser.uid,
          updatedAt: Date.now()
        };
        batch.update(flagsDoc.ref, resetFlags);
        console.log(`Resetting existing flags document for character: ${characterData.name} and user: ${currentUser.uid}`);
      }

      // 8. Create spellbook record (empty for new characters)
      const spellbookRef = doc(collection(firestore, 'spellbook'));
      const spellbookData: Spellbook = {
        ...DEFAULT_SPELLBOOK,
        charname: characterData.name
      };
      batch.set(spellbookRef, spellbookData);

      // Commit all changes atomically
      await batch.commit();
      console.log(`Successfully created character: ${characterData.name} with all associated data`);

      // Verify flags were created properly
      const flagsVerified = await this.verifyCharacterFlags(characterData.name);
      if (!flagsVerified) {
        console.warn(`Warning: Flags verification failed for character: ${characterData.name}`);
      }

      // Reload characters after creating new one
      await this.loadCharacters();

      return charRef.id;
    });
  }

  // Method to update an existing character
  async updateCharacter(characterId: string, updates: Partial<CharStats>): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const docRef = doc(firestore, 'charstats', characterId);
      await updateDoc(docRef, {
        ...updates,
        updatedAt: Date.now()
      });
    });
  }

  // Method to delete a character (now uses comprehensive deletion)
  async deleteCharacter(characterId: string): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
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
    });
  }

  // Method to refresh characters (useful for manual refresh)
  refreshCharacters(): void {
    // The signal will automatically update when the underlying observable changes
    // This method can be used to trigger a manual refresh if needed
  }

  // Method to get character flags
  async getCharacterFlags(characterName: string): Promise<Flags | null> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const flagsQuery = query(
        collection(firestore, 'flags'),
        where('charname', '==', characterName)
      );
      const flagsSnapshot = await getDocs(flagsQuery);

      if (flagsSnapshot.empty) {
        return null;
      }

      return flagsSnapshot.docs[0].data() as Flags;
    });
  }

  // Method to update character flags
  async updateCharacterFlags(characterName: string, updates: Partial<Flags>): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const flagsQuery = query(
        collection(firestore, 'flags'),
        where('charname', '==', characterName)
      );
      const flagsSnapshot = await getDocs(flagsQuery);

      if (flagsSnapshot.empty) {
        throw new Error(`Flags not found for character: ${characterName}`);
      }

      const flagsDoc = flagsSnapshot.docs[0];
      await updateDoc(doc(firestore, 'flags', flagsDoc.id), {
        ...updates,
        updatedAt: Date.now()
      });
    });
  }

  // Method to set a specific flag
  async setCharacterFlag(characterName: string, flagKey: keyof Flags, value: any): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const flagsQuery = query(
        collection(firestore, 'flags'),
        where('charname', '==', characterName)
      );
      const flagsSnapshot = await getDocs(flagsQuery);

      if (!flagsSnapshot.empty) {
        const flagsDoc = flagsSnapshot.docs[0];
        const update: any = {};
    update[flagKey] = value;
        await updateDoc(flagsDoc.ref, update);
      }
    });
  }

  // Method to clear all inventory items for a character
  async clearCharacterInventory(characterId: string): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const character = this.getCharacterById(characterId);
      if (!character) {
        throw new Error('Character not found');
      }

      // Delete all inventory items for this character
      const inventoryQuery = query(
        collection(firestore, 'inventory'),
        where('charname', '==', character.name)
      );
      const inventorySnapshot = await getDocs(inventoryQuery);

      const batch = writeBatch(firestore);
      inventorySnapshot.docs.forEach(doc => {
        batch.delete(doc.ref);
      });

      await batch.commit();
      console.log(`Cleared ${inventorySnapshot.docs.length} inventory items for character: ${character.name}`);
    });
  }

  // Method to clear replenishment data for a character
  async clearCharacterReplenishment(characterName: string): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);

      // Delete replenishment data for this character
      const replenishmentRef = doc(firestore, 'replenishableItems', characterName);
      try {
        await deleteDoc(replenishmentRef);
        console.log(`Cleared replenishment data for character: ${characterName}`);
      } catch (error) {
        // Document might not exist, which is fine
        console.log(`No replenishment data found for character: ${characterName}`);
      }
    });
  }

  /**
   * Reset all character flags to 0 (useful for character reset without deletion)
   */
  async resetCharacterFlags(characterName: string): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const flagsQuery = query(
        collection(firestore, 'flags'),
        where('charname', '==', characterName)
      );
      const flagsSnapshot = await getDocs(flagsQuery);

      if (flagsSnapshot.empty) {
        // Create a new flags document if it doesn't exist
        const flagsRef = doc(collection(firestore, 'flags'));
        const flagsData: Flags = {
          ...DEFAULT_FLAGS,
          charname: characterName
        };
        await addDoc(collection(firestore, 'flags'), flagsData);
        console.log(`Created new flags document for character: ${characterName}`);
      } else {
        // Reset existing flags to 0
        const flagsDoc = flagsSnapshot.docs[0];
        const resetFlags: Partial<Flags> = {
          firelit: 'n',
          homechest: 0,
          homefireplace: 0,
          homepantry: 0,
          homerack: 0,
          homedrawer: 0,
          homeshelf: 0,
          homeshelf2: 0,
          hometable: 0,
          homerug: 0,
          bedroomrug: 0,
          bedroomwardrobe: 0,
          bedroomdesk: 0,
          bedroomcoatrack: 0,
          bedroomshelf: 0,
          bedroomchest: 0,
          bedroombed: 0,
          quest1: 0,
          quest2: 0,
          quest3: 0,
          quest4: 0,
          quest5: 0,
          shepfeed: 0,
          thehiddenkey: 0,
          familycrest: 0,
          tutorial_completed: 0,
          first_combat: 0,
          first_craft: 0,
          first_spell: 0,
          updatedAt: Date.now()
        };
        await updateDoc(flagsDoc.ref, resetFlags);
        console.log(`Reset all flags to 0 for character: ${characterName}`);
      }
    });
  }

  /**
   * Verify that character flags exist and are properly initialized
   */
  async verifyCharacterFlags(characterName: string): Promise<boolean> {
    return runInInjectionContext(this.injector, async () => {
      const flags = await this.getCharacterFlags(characterName);
      if (!flags) {
        console.warn(`No flags document found for character: ${characterName}`);
        return false;
      }

      // Check if all required flags exist and are numbers (not undefined)
      const requiredFlags = [
        'homechest', 'homefireplace', 'homepantry', 'homerack', 'homedrawer',
        'homeshelf', 'homeshelf2', 'hometable', 'homerug', 'bedroomrug',
        'bedroomwardrobe', 'bedroomdesk', 'bedroomcoatrack', 'bedroomshelf',
        'bedroomchest', 'bedroombed', 'quest1', 'quest2', 'quest3', 'quest4',
        'quest5', 'shepfeed', 'thehiddenkey', 'familycrest'
      ];

      for (const flag of requiredFlags) {
        if (typeof flags[flag as keyof Flags] !== 'number') {
          console.warn(`Flag ${flag} is missing or not a number for character: ${characterName}`);
          return false;
        }
      }

      console.log(`Flags verification successful for character: ${characterName}`);
      return true;
    });
  }
}
