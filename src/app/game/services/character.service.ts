import { Injectable, inject, signal, computed, Signal } from '@angular/core';
import { Firestore, collection, collectionData } from '@angular/fire/firestore';
import { CharStats } from '../models/charstats.model';
import { toSignal } from '@angular/core/rxjs-interop';

@Injectable({
  providedIn: 'root'
})
export class CharacterService {
  private firestore: Firestore = inject(Firestore);

  // Use toSignal to convert Firestore observable to signal
  private charactersSignal = toSignal(
    collectionData(collection(this.firestore, 'charstats'), { idField: 'id' }) as any,
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
}
