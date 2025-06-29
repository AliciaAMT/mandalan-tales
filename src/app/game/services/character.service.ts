import { Injectable, inject, signal, computed, Signal, effect } from '@angular/core';
import { Firestore, collection, collectionData, query, where, addDoc, doc, updateDoc } from '@angular/fire/firestore';
import { CharStats } from '../models/charstats.model';
import { toSignal } from '@angular/core/rxjs-interop';
import { AuthService } from '../../services/auth.service';

@Injectable({
  providedIn: 'root'
})
export class CharacterService {
  private firestore: Firestore = inject(Firestore);
  private authService: AuthService = inject(AuthService);

  // Use toSignal to convert Firestore observable to signal with user filtering
  private charactersSignal = toSignal(
    collectionData(
      query(
        collection(this.firestore, 'charstats'),
        where('userId', '==', this.authService.getCurrentUser()?.uid || '')
      ),
      { idField: 'id' }
    ) as any,
    { initialValue: [] as CharStats[] }
  ) as Signal<CharStats[]>;

  // Expose as readonly signal
  characters = this.charactersSignal;

  // Computed values for filtered characters
  getCharacters(): CharStats[] {
    return this.characters();
  }

  // Helper method to get character by ID
  getCharacterById(id: string): CharStats | undefined {
    return this.characters().find((char: CharStats) => char.id === id);
  }

  // Method to create a new character
  async createCharacter(characterData: CharStats): Promise<string> {
    const currentUser = this.authService.getCurrentUser();
    if (!currentUser) {
      throw new Error('User not authenticated');
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

  // Method to refresh characters when user changes
  refreshCharacters(): void {
    // The signal will automatically update when the user changes
    // due to the reactive query
  }
}
