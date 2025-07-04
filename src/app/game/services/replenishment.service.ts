import { Injectable, signal, runInInjectionContext, Injector } from '@angular/core';
import { Firestore, doc, getDoc, setDoc, updateDoc } from '@angular/fire/firestore';

export interface ReplenishableItem {
  id: string;
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
  async initializeReplenishableItems(characterName: string): Promise<void> {
    const docSnap = await runInInjectionContext(this.injector, () => {
      const docRef = doc(this.firestore, 'replenishableItems', characterName);
      return getDoc(docRef);
    });

    if (!docSnap.exists()) {
      // Create initial replenishable items
      const initialItems: ReplenishableItem[] = [
        {
          id: 'fruit_tree_1',
          name: 'Apple Tree',
          type: 'fruit',
          location: 'yard',
          x: 3,
          y: 1,
          lastHarvested: 0,
          respawnTime: 5 * 60 * 1000, // 5 minutes
          maxQuantity: 3,
          currentQuantity: 3,
          itemData: {
            name: 'Apple',
            description: 'A ripe apple from the tree.',
            type: 'Food',
            image: 'apple',
            quantity: 1,
            options: { consumable: 1 }
          }
        },
        {
          id: 'fruit_tree_2',
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
          id: 'herb_patch_1',
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
          id: 'berry_bush_1',
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

      await runInInjectionContext(this.injector, () => {
        const docRef = doc(this.firestore, 'replenishableItems', characterName);
        return setDoc(docRef, { items: initialItems });
      });
      this.replenishableItems.set(initialItems);
    } else {
      // Load existing items and check for respawns
      const data = docSnap.data();
      const items = data['items'] as ReplenishableItem[];

      // Check for respawns
      const updatedItems = items.map(item => this.checkRespawn(item));

      // Update Firestore with any respawned items
      if (JSON.stringify(items) !== JSON.stringify(updatedItems)) {
        await runInInjectionContext(this.injector, () => {
          const docRef = doc(this.firestore, 'replenishableItems', characterName);
          return setDoc(docRef, { items: updatedItems });
        });
      }

      this.replenishableItems.set(updatedItems);
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
