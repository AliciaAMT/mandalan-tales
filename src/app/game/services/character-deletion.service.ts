import { Injectable, inject } from '@angular/core';
import { Firestore, collection, query, where, getDocs, deleteDoc, doc, writeBatch } from '@angular/fire/firestore';
import { AuthService } from '../../services/auth.service';

@Injectable({
  providedIn: 'root'
})
export class CharacterDeletionService {
  private firestore: Firestore = inject(Firestore);
  private authService: AuthService = inject(AuthService);

  /**
   * Comprehensive character deletion that removes all associated data
   * @param characterId The ID of the character to delete
   * @param characterName The name of the character (for collections that use charname)
   */
  async deleteCharacterCompletely(characterId: string, characterName: string): Promise<void> {
    const currentUser = this.authService.getCurrentUser();
    if (!currentUser) {
      throw new Error('User not authenticated');
    }

    // Use a batch to ensure all deletions happen atomically
    const batch = writeBatch(this.firestore);

    try {
      // 1. Delete main character document
      const charDocRef = doc(this.firestore, 'charstats', characterId);
      batch.delete(charDocRef);

      // 2. Delete inventory items
      await this.deleteCollectionByCharacterId('inventory', characterId, batch);

      // 3. Delete spells (spellbook)
      await this.deleteCollectionByCharacterId('spellbook', characterId, batch);

      // 4. Delete skills
      await this.deleteCollectionByCharacterId('skills', characterId, batch);

      // 5. Delete enemy data
      await this.deleteCollectionByCharacterName('enemy', characterName, batch);

      // 6. Delete counters
      await this.deleteCollectionByCharacterName('counters', characterName, batch);

      // 7. Delete flags
      await this.deleteCollectionByCharacterName('flags', characterName, batch);

      // 8. Delete cookbook entries
      await this.deleteCollectionByCharacterName('cookbook', characterName, batch);

      // 9. Delete any quest data
      await this.deleteCollectionByCharacterId('quests', characterId, batch);

      // 10. Delete any achievements
      await this.deleteCollectionByCharacterId('achievements', characterId, batch);

      // 11. Delete any game state data
      await this.deleteCollectionByCharacterId('gameState', characterId, batch);

      // 12. Delete any chat history
      await this.deleteCollectionByCharacterId('chatHistory', characterId, batch);

      // 13. Delete any trade history
      await this.deleteCollectionByCharacterId('tradeHistory', characterId, batch);

      // 14. Delete any guild membership
      await this.deleteCollectionByCharacterId('guildMembers', characterId, batch);

      // 15. Delete any friend lists
      await this.deleteCollectionByCharacterId('friends', characterId, batch);

      // Execute all deletions in a single batch
      await batch.commit();

      console.log(`Successfully deleted character ${characterName} and all associated data`);
    } catch (error) {
      console.error('Error during character deletion:', error);
      throw new Error(`Failed to delete character: ${error}`);
    }
  }

  /**
   * Delete documents from a collection that match a characterId field
   */
  private async deleteCollectionByCharacterId(
    collectionName: string,
    characterId: string,
    batch: any
  ): Promise<void> {
    try {
      const collectionRef = collection(this.firestore, collectionName);
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
  }

  /**
   * Delete documents from a collection that match a charname field (legacy format)
   */
  private async deleteCollectionByCharacterName(
    collectionName: string,
    characterName: string,
    batch: any
  ): Promise<void> {
    try {
      const collectionRef = collection(this.firestore, collectionName);
      const q = query(collectionRef, where('charname', '==', characterName));
      const querySnapshot = await getDocs(q);

      querySnapshot.forEach((doc) => {
        batch.delete(doc.ref);
      });

      console.log(`Deleted ${querySnapshot.size} documents from ${collectionName} for character ${characterName}`);
    } catch (error) {
      console.warn(`Warning: Could not delete from ${collectionName}:`, error);
      // Don't throw error here as some collections might not exist yet
    }
  }

  /**
   * Get a list of all collections that might contain character data
   * This is useful for debugging and ensuring complete deletion
   */
  async getCharacterDataSummary(characterId: string, characterName: string): Promise<any> {
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
        const collectionRef = collection(this.firestore, collectionInfo.name);
        const q = query(collectionRef, where(collectionInfo.field, '==', collectionInfo.value));
        const querySnapshot = await getDocs(q);
        summary[collectionInfo.name] = querySnapshot.size;
      } catch (error) {
        summary[collectionInfo.name] = 'Error checking collection';
      }
    }

    return summary;
  }

  /**
   * Verify that all character data has been deleted
   */
  async verifyCharacterDeletion(characterId: string, characterName: string): Promise<boolean> {
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
  }
}
