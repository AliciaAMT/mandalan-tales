import { Injectable, inject, signal, computed, Signal, effect } from '@angular/core';
import { Firestore, collection, collectionData, query, where, addDoc, doc, updateDoc, deleteDoc } from '@angular/fire/firestore';
import { CharStats } from '../models/charstats.model';
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

  // Method to create a new character
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

    const docRef = await addDoc(collection(this.firestore, 'charstats'), characterWithUserId);
    return docRef.id;
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
