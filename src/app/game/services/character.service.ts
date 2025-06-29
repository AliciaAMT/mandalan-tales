import { Injectable, inject, signal, computed, Signal, effect } from '@angular/core';
import { Firestore, collection, collectionData, query, where } from '@angular/fire/firestore';
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

  // Method to refresh characters when user changes
  refreshCharacters(): void {
    // The signal will automatically update when the user changes
    // due to the reactive query
  }
}
