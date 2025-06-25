import { Injectable } from '@angular/core';
import { Firestore, collection, collectionData } from '@angular/fire/firestore';
import { CharStats } from '../models/charstats.model';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CharacterService {
  constructor(private firestore: Firestore) {}

  getCharacters(): Observable<CharStats[]> {
    const charsRef = collection(this.firestore, 'charstats');
    return collectionData(charsRef, { idField: 'id' }) as Observable<CharStats[]>;
  }
}
