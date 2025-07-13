import { Injectable, signal, runInInjectionContext, Injector } from '@angular/core';
import { Firestore, doc, getDoc, setDoc, updateDoc, collection, query, where, getDocs, addDoc } from '@angular/fire/firestore';

export interface ReplenishableItem {
  id?: string; // Firestore UID
  userId: string;
  charname: string;
  name: string;
  type: 'fruit' | 'herb' | 'resource';
  location: string;
  x: number;
  y: number;
  lastHarvested: number;
  respawnTime: number; // in milliseconds
  maxQuantity: number;
  currentQuantity: number;
  itemData: {
    name: string;
    description: string;
    type: string;
    image: string;
    quantity: number;
    options?: any;
  };
}

@Injectable({
  providedIn: 'root'
})
export class ReplenishmentService {
  private replenishableItems = signal<ReplenishableItem[]>([]);

  constructor(
    private firestore: Firestore,
    private injector: Injector
  ) {}

  /**
   * Initialize replenishable items for a character
   */
  async initializeReplenishableItems(characterName: string, userId: string): Promise<void> {
    // Query all replenishableItems for this user and character
    const itemsRef = collection(this.firestore, 'replenishableItems');
    const q = query(itemsRef, where('userId', '==', userId), where('charname', '==', characterName));
    const snapshot = await getDocs(q);
    if (snapshot.empty) {
      // Create initial replenishable items as separate docs
      const initialItems: Omit<ReplenishableItem, 'id'>[] = [
        // Apple Tree removed - now handled by tile action service
        {
          userId,
          charname: characterName,
          name: 'Orange Tree',
          type: 'fruit',
          location: 'yard',
          x: 1,
          y: 3,
          lastHarvested: 0,
          respawnTime: 5 * 60 * 1000, // 5 minutes
          maxQuantity: 2,
          currentQuantity: 2,
          itemData: {
            name: 'Orange',
            description: 'A juicy orange from the tree.',
            type: 'Food',
            image: 'orange',
            quantity: 1,
            options: { consumable: 1 }
          }
        },
        {
          userId,
          charname: characterName,
          name: 'Herb Garden',
          type: 'herb',
          location: 'yard',
          x: 4,
          y: 2,
          lastHarvested: 0,
          respawnTime: 3 * 60 * 1000, // 3 minutes
          maxQuantity: 2,
          currentQuantity: 2,
          itemData: {
            name: 'Aloe',
            description: 'Aloe vera plant, useful for healing.',
            type: 'Other',
            image: 'aloe',
            quantity: 1,
            options: { othertype: 'Herb' }
          }
        },
        {
          userId,
          charname: characterName,
          name: 'Berry Bush',
          type: 'fruit',
          location: 'yard',
          x: 2,
          y: 4,
          lastHarvested: 0,
          respawnTime: 2 * 60 * 1000, // 2 minutes
          maxQuantity: 4,
          currentQuantity: 4,
          itemData: {
            name: 'Berry',
            description: 'Sweet berries from the bush.',
            type: 'Food',
            image: 'berry',
            quantity: 1,
            options: { consumable: 1 }
          }
        }
      ];
      // Add each item as a separate doc
      for (const item of initialItems) {
        await addDoc(itemsRef, item);
      }
      this.replenishableItems.set(initialItems as ReplenishableItem[]);
    } else {
      // Load existing items
      const items: ReplenishableItem[] = snapshot.docs.map(docSnap => ({ id: docSnap.id, ...docSnap.data() } as ReplenishableItem));

      // Filter out Apple Tree items that conflict with tile action service
      const filteredItems = items.filter(item => !(item.name === 'Apple Tree' && item.location === 'yard' && item.x === 3 && item.y === 1));

      // Check for respawns
      const updatedItems = filteredItems.map(item => this.checkRespawn(item));
      this.replenishableItems.set(updatedItems);

      // If we filtered out any Apple Tree items, delete them from Firestore
      const itemsToDelete = items.filter(item => item.name === 'Apple Tree' && item.location === 'yard' && item.x === 3 && item.y === 1);
      if (itemsToDelete.length > 0) {
        console.log('Removing conflicting Apple Tree items from database');
        const { deleteDoc } = await import('@angular/fire/firestore');
        for (const item of itemsToDelete) {
          if (item.id) {
            const docRef = doc(this.firestore, 'replenishableItems', item.id);
            await deleteDoc(docRef);
          }
        }
      }
    }
  }

  /**
   * Check if an item has respawned and update its quantity
   */
  private checkRespawn(item: ReplenishableItem): ReplenishableItem {
    const now = Date.now();
    const timeSinceHarvest = now - item.lastHarvested;

    if (timeSinceHarvest >= item.respawnTime && item.currentQuantity < item.maxQuantity) {
      // Item has respawned
      return {
        ...item,
        currentQuantity: item.maxQuantity,
        lastHarvested: 0
      };
    }

    return item;
  }

  /**
   * Get replenishable items for current location
   */
  getReplenishableItems(location: string, x: number, y: number): ReplenishableItem[] {
    return this.replenishableItems().filter(item =>
      item.location === location &&
      item.x === x &&
      item.y === y &&
      item.currentQuantity > 0
    );
  }

  /**
   * Harvest an item from a replenishable source
   */
  async harvestItem(characterName: string, itemId: string): Promise<ReplenishableItem | null> {
    const items = this.replenishableItems();
    const itemIndex = items.findIndex(item => item.id === itemId);

    if (itemIndex === -1 || items[itemIndex].currentQuantity <= 0) {
      return null;
    }

    const item = items[itemIndex];
    const updatedItem = {
      ...item,
      currentQuantity: item.currentQuantity - 1,
      lastHarvested: Date.now()
    };

    // Update local signal
    const updatedItems = [...items];
    updatedItems[itemIndex] = updatedItem;
    this.replenishableItems.set(updatedItems);

    // Update Firestore
    await runInInjectionContext(this.injector, () => {
      const docRef = doc(this.firestore, 'replenishableItems', characterName);
      return updateDoc(docRef, { items: updatedItems });
    });

    return updatedItem;
  }
}
