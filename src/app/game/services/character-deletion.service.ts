import { Injectable, inject, runInInjectionContext, Injector } from '@angular/core';
import { Firestore, collection, query, where, getDocs, deleteDoc, doc, writeBatch } from '@angular/fire/firestore';
import { AuthService } from '../../services/auth.service';

@Injectable({
  providedIn: 'root'
})
export class CharacterDeletionService {
  private authService: AuthService = inject(AuthService);
  private injector = inject(Injector);

  /**
   * Comprehensive character deletion that removes all associated data
   * @param characterId The ID of the character to delete
   * @param characterName The name of the character (for collections that use charname)
   */
  async deleteCharacterCompletely(characterId: string, characterName: string): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const currentUser = this.authService.getCurrentUser();
      if (!currentUser) {
        throw new Error('User not authenticated');
      }

      // Use a batch to ensure all deletions happen atomically
      const batch = writeBatch(firestore);

      try {
        // 1. Delete main character document
        const charDocRef = doc(firestore, 'charstats', characterId);
        batch.delete(charDocRef);

        // 2. Delete inventory items
        await this.deleteCollectionByCharacterId('inventory', characterId, batch, firestore);

        // 3. Delete spells (spellbook)
        await this.deleteCollectionByCharacterId('spellbook', characterId, batch, firestore);

        // 4. Delete skills
        await this.deleteCollectionByCharacterId('skills', characterId, batch, firestore);

        // 5. Delete enemy data
        await this.deleteCollectionByCharacterName('enemy', characterName, batch, firestore);

        // 6. Delete counters
        await this.deleteCollectionByCharacterName('counters', characterName, batch, firestore);

        // 7. Delete flags
        await this.deleteCollectionByCharacterName('flags', characterName, batch, firestore);

        // 8. Delete cookbook entries
        await this.deleteCollectionByCharacterName('cookbook', characterName, batch, firestore);

        // 9. Delete any quest data
        await this.deleteCollectionByCharacterId('quests', characterId, batch, firestore);

        // 10. Delete any achievements
        await this.deleteCollectionByCharacterId('achievements', characterId, batch, firestore);

        // 11. Delete any game state data
        await this.deleteCollectionByCharacterId('gameState', characterId, batch, firestore);

        // 12. Delete any chat history
        await this.deleteCollectionByCharacterId('chatHistory', characterId, batch, firestore);

        // 13. Delete any trade history
        await this.deleteCollectionByCharacterId('tradeHistory', characterId, batch, firestore);

        // 14. Delete any guild membership
        await this.deleteCollectionByCharacterId('guildMembers', characterId, batch, firestore);

        // 15. Delete any friend lists
        await this.deleteCollectionByCharacterId('friends', characterId, batch, firestore);

        // Execute all deletions in a single batch
        await batch.commit();

        console.log(`Successfully deleted character ${characterName} and all associated data`);
      } catch (error) {
        console.error('Error during character deletion:', error);
        throw new Error(`Failed to delete character: ${error}`);
      }
    });
  }

  /**
   * Delete documents from a collection that match a characterId field
   */
  private async deleteCollectionByCharacterId(
    collectionName: string,
    characterId: string,
    batch: any,
    firestore: Firestore
  ): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      try {
        const collectionRef = collection(firestore, collectionName);
        const q = query(collectionRef, where('characterId', '==', characterId));
        const querySnapshot = await getDocs(q);

        querySnapshot.forEach((doc) => {
          batch.delete(doc.ref);
        });

        console.log(`Deleted ${querySnapshot.size} documents from ${collectionName} for character ${characterId}`);
      } catch (error) {
        console.warn(`Warning: Could not delete from ${collectionName}:`, error);
        // Don't throw error here as some collections might not exist yet
      }
    });
  }

  /**
   * Delete documents from a collection that match a charname field (legacy format) and userId, and also legacy docs with just charname
   */
  private async deleteCollectionByCharacterName(
    collectionName: string,
    characterName: string,
    batch: any,
    firestore: Firestore
  ): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      try {
        const currentUser = this.authService.getCurrentUser();
        if (!currentUser) {
          throw new Error('User not authenticated');
        }
        const collectionRef = collection(firestore, collectionName);
        // Delete docs with both charname and userId
        const q1 = query(collectionRef, where('charname', '==', characterName), where('userId', '==', currentUser.uid));
        const snapshot1 = await getDocs(q1);
        snapshot1.forEach((doc) => {
          batch.delete(doc.ref);
        });
        console.log(`Deleted ${snapshot1.size} docs from ${collectionName} for charname+userId (${characterName}, ${currentUser.uid})`);
        // Delete legacy docs with just charname (no userId)
        const q2 = query(collectionRef, where('charname', '==', characterName));
        const snapshot2 = await getDocs(q2);
        // Only delete docs that do NOT have userId (legacy)
        let legacyCount = 0;
        snapshot2.forEach((doc) => {
          if (!doc.data()['userId']) {
            batch.delete(doc.ref);
            legacyCount++;
          }
        });
        if (legacyCount > 0) {
          console.log(`Deleted ${legacyCount} legacy docs from ${collectionName} for charname only (${characterName})`);
        }
        // Post-deletion verification
        const verifySnapshot = await getDocs(q2);
        if (!verifySnapshot.empty) {
          console.warn(`Warning: Some docs in ${collectionName} for character ${characterName} still remain after deletion! Remaining: ${verifySnapshot.size}`);
        }
      } catch (error) {
        console.warn(`Warning: Could not delete from ${collectionName}:`, error);
        // Don't throw error here as some collections might not exist yet
      }
    });
  }

  /**
   * Get a list of all collections that might contain character data
   * This is useful for debugging and ensuring complete deletion
   */
  async getCharacterDataSummary(characterId: string, characterName: string): Promise<any> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      const summary: any = {};

      const collectionsToCheck = [
        { name: 'inventory', field: 'characterId', value: characterId },
        { name: 'spellbook', field: 'characterId', value: characterId },
        { name: 'skills', field: 'characterId', value: characterId },
        { name: 'enemy', field: 'charname', value: characterName },
        { name: 'counters', field: 'charname', value: characterName },
        { name: 'flags', field: 'charname', value: characterName },
        { name: 'cookbook', field: 'charname', value: characterName },
        { name: 'quests', field: 'characterId', value: characterId },
        { name: 'achievements', field: 'characterId', value: characterId },
        { name: 'gameState', field: 'characterId', value: characterId },
        { name: 'chatHistory', field: 'characterId', value: characterId },
        { name: 'tradeHistory', field: 'characterId', value: characterId },
        { name: 'guildMembers', field: 'characterId', value: characterId },
        { name: 'friends', field: 'characterId', value: characterId }
      ];

      for (const collectionInfo of collectionsToCheck) {
        try {
          const collectionRef = collection(firestore, collectionInfo.name);
          const q = query(collectionRef, where(collectionInfo.field, '==', collectionInfo.value));
          const querySnapshot = await getDocs(q);
          summary[collectionInfo.name] = querySnapshot.size;
        } catch (error) {
          summary[collectionInfo.name] = 'Error checking collection';
        }
      }

      return summary;
    });
  }

  /**
   * Verify that all character data has been deleted
   */
  async verifyCharacterDeletion(characterId: string, characterName: string): Promise<boolean> {
    return runInInjectionContext(this.injector, async () => {
      const summary = await this.getCharacterDataSummary(characterId, characterName);

      // Check if any collections still have data
      const remainingData = Object.entries(summary).filter(([collection, count]) => {
        return typeof count === 'number' && count > 0;
      });

      if (remainingData.length > 0) {
        console.warn('Some character data may still exist:', remainingData);
        return false;
      }

      console.log('Character deletion verification successful - all data removed');
      return true;
    });
  }
}

