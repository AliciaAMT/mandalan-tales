import { Injectable, inject } from '@angular/core';
import { CharacterService } from './character.service';
import { InventoryService } from './inventory.service';

export interface TileAction {
  map: string;
  x: number;
  y: number;
  action: string;
  items?: {
    name: string;
    description: string;
    image: string;
    type: string;
    options?: any;
  }[];
  itemName?: string; // Legacy single item support
  itemDescription?: string;
  itemImage?: string;
  itemType?: string;
  itemOptions?: any;
  flagKey?: string;
  questFlagKey?: string;
  questFlagValue?: number;
  experience?: number;
  message: string;
  alreadyFoundMessage?: string;
}

@Injectable({ providedIn: 'root' })
export class TileActionService {
  private characterService = inject(CharacterService);
  private inventoryService = inject(InventoryService);

  // Define all tile actions organized by map and coordinates
  private tileActions: TileAction[] = [
    // Homeup map actions
    {
      map: 'homeup',
      x: 1,
      y: 3,
      action: 'search',
      itemName: 'Locked Box',
      itemDescription: 'You remember hiding your most valued possession in this lockbox. It requires a special key.',
      itemImage: 'lockedbox',
      itemType: 'Other',
      itemOptions: {
        itemrarity: 'Relic',
        itemlevel: 1,
        keylock: 1,
        othertype: 'Container'
      },
      flagKey: 'bedroombed',
      questFlagKey: 'thehiddenkey',
      questFlagValue: 2,
      experience: 5,
      message: 'You search the bed and find a locked box. You remember hiding your most valued possession in this lockbox. It requires a special key.',
      alreadyFoundMessage: 'You search under the bed but find nothing.'
    },
    {
      map: 'homeup',
      x: 2,
      y: 2,
      action: 'search',
      itemName: 'Small Rusty Key',
      itemDescription: 'This is a special key you hid under your rug.',
      itemImage: 'smallrustykey',
      itemType: 'Other',
      itemOptions: {
        itemrarity: 'Relic',
        itemlevel: 1,
        othertype: 'Quest'
      },
      flagKey: 'bedroomrug',
      questFlagKey: 'thehiddenkey',
      questFlagValue: 1,
      experience: 5,
      message: 'You search under the rug and find a small rusty key. This is a special key you hid under your rug.',
      alreadyFoundMessage: 'You search under the rug but find nothing.'
    },
    {
      map: 'homeup',
      x: 3,
      y: 1,
      action: 'search',
      itemName: 'Worn Canvas Shirt',
      itemDescription: 'This is an ordinary Canvas Shirt, a little worn for the wear.',
      itemImage: 'worncanvasshirt',
      itemType: 'Armor',
      itemOptions: {
        itemrarity: 'Common',
        itemlevel: 1,
        equiplocation: 'Chest',
        equipable: 1,
        weapontype: 'None',
        armortype: 'Chest',
        armorbase: 3
      },
      flagKey: 'bedroomwardrobe',
      experience: 10,
      message: 'You search the wardrobe and find a worn canvas shirt.',
      alreadyFoundMessage: 'You search the wardrobe but find nothing.'
    },
    {
      map: 'homeup',
      x: 3,
      y: 2,
      action: 'examine',
      itemName: 'Small Waterskin',
      itemDescription: 'This water container holds about one eight-hour serving of water, and it is refillable.',
      itemImage: 'smallwaterskin',
      itemType: 'Food',
      itemOptions: {
        itemrarity: 'Common',
        itemlevel: 1,
        maxwater: 1,
        othertype: 'Water'
      },
      flagKey: 'bedroomdesk',
      experience: 10,
      message: 'You examine the desk and find a small waterskin.',
      alreadyFoundMessage: 'You examine the desk but find nothing.'
    },
    // Coatrack at homeup (1,2) - gives Worn Canvas Cloak and Worn Canvas Hat
    {
      map: 'homeup',
      x: 1,
      y: 2,
      action: 'examine',
      items: [
        {
          name: 'Worn Canvas Cloak',
          description: 'This is an ordinary Canvas Cloak, a little worn for the wear.',
          image: 'worncanvascloak',
          type: 'Armor',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            equiplocation: 'Back',
            equipable: 1,
            weapontype: 'None',
            armortype: 'Back',
            armorbase: 3
          }
        },
        {
          name: 'Worn Canvas Hat',
          description: 'This is an ordinary Canvas Hat, a little worn for the wear.',
          image: 'worncanvashat',
          type: 'Armor',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            equiplocation: 'Head',
            equipable: 1,
            weapontype: 'None',
            armortype: 'Head',
            armorbase: 3
          }
        }
      ],
      flagKey: 'bedroomcoatrack',
      experience: 10,
      message: 'You examine the coatrack and find a worn canvas cloak and hat.',
      alreadyFoundMessage: 'You examine the coat rack but find nothing.'
    },
    // Shelf at homeup (3,3) - gives Book of Laws
    {
      map: 'homeup',
      x: 3,
      y: 3,
      action: 'examine',
      itemName: 'Book of Laws',
      itemDescription: 'This is your personal copy of the kingdom\'s required reading. On the worn cover the title, \'Book of Laws\' is scratched out, and under it is written \'Book O\' Flaws\' in your own messy caligraphy.',
      itemImage: 'bookoflaws',
      itemType: 'Other',
      itemOptions: {
        itemrarity: 'Relic',
        itemlevel: 1,
        readable: 1,
        othertype: 'Book'
      },
      flagKey: 'bedroomshelf',
      experience: 5,
      message: 'You examine the shelf and find a book of laws.',
      alreadyFoundMessage: 'You examine the shelf but find nothing.'
    },
    // Chest at homeup (2,3) - gives Worn Canvas Shoes and Worn Canvas Gloves
    {
      map: 'homeup',
      x: 2,
      y: 3,
      action: 'search',
      items: [
        {
          name: 'Worn Canvas Shoes',
          description: 'This is an ordinary pair of Canvas Shoes, a little worn for the wear.',
          image: 'worncanvasshoes',
          type: 'Armor',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            equiplocation: 'Feet',
            equipable: 1,
            weapontype: 'None',
            armortype: 'Feet',
            armorbase: 3
          }
        },
        {
          name: 'Worn Canvas Gloves',
          description: 'This is an ordinary pair of Canvas Gloves, a little worn for the wear.',
          image: 'worncanvasgloves',
          type: 'Armor',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            equiplocation: 'Hands',
            equipable: 1,
            weapontype: 'None',
            armortype: 'Hands',
            armorbase: 3
          }
        }
      ],
      flagKey: 'bedroomchest',
      experience: 10,
      message: 'You search the chest and find worn canvas shoes and gloves.',
      alreadyFoundMessage: 'You search the Chest but find nothing.'
    }
  ];

  /**
   * Get tile action for a specific map and coordinates
   */
  getTileAction(map: string, x: number, y: number, action: string): TileAction | null {
    return this.tileActions.find(ta =>
      ta.map === map &&
      ta.x === x &&
      ta.y === y &&
      ta.action === action
    ) || null;
  }

  /**
   * Handle tile action and return result
   */
  async handleTileAction(map: string, x: number, y: number, action: string, characterName?: string): Promise<{ message: string, items?: any[] }> {
    const tileAction = this.getTileAction(map, x, y, action);

    if (!tileAction) {
      return { message: `You ${action} but find nothing of interest.` };
    }

    if (!characterName) {
      return { message: tileAction.message };
    }

    // Check if already found
    if (tileAction.flagKey) {
      const flags = await this.characterService.getCharacterFlags(characterName);
      if (flags?.[tileAction.flagKey as keyof typeof flags] === 1) {
        return { message: tileAction.alreadyFoundMessage || 'You search but find nothing.' };
      }
    }

    // Award items
    const foundItems: any[] = [];

    if (tileAction.items && tileAction.items.length > 0) {
      // Handle multiple items
      for (const itemData of tileAction.items) {
        const item = this.inventoryService.createBasicItem(
          itemData.name,
          itemData.description,
          itemData.type,
          itemData.image,
          1,
          itemData.options || {}
        );

        const success = await this.inventoryService.addItem(item);
        if (success) {
          foundItems.push({
            name: itemData.name,
            description: itemData.description,
            image: itemData.image,
            quantity: 1
          });
        }
      }
    } else if (tileAction.itemName) {
      // Handle single item (legacy support)
      const item = this.inventoryService.createBasicItem(
        tileAction.itemName,
        tileAction.itemDescription || '',
        tileAction.itemType || 'Other',
        tileAction.itemImage || 'default',
        1,
        tileAction.itemOptions || {}
      );

      const success = await this.inventoryService.addItem(item);
      if (success) {
        foundItems.push({
          name: tileAction.itemName,
          description: tileAction.itemDescription,
          image: tileAction.itemImage,
          quantity: 1
        });
      }
    }

    if (foundItems.length > 0) {
      // Update flag
      if (tileAction.flagKey) {
        await this.characterService.setCharacterFlag(characterName, tileAction.flagKey as any, 1);
      }

      // Update quest flag
      if (tileAction.questFlagKey && tileAction.questFlagValue) {
        const flags = await this.characterService.getCharacterFlags(characterName);
        if (flags?.[tileAction.questFlagKey as keyof typeof flags] === 0) {
          await this.characterService.setCharacterFlag(characterName, tileAction.questFlagKey as any, tileAction.questFlagValue);
        }
      }

      return {
        message: tileAction.message,
        items: foundItems
      };
    } else {
      return { message: `You find items but your inventory is full.` };
    }

    return { message: tileAction?.message || 'You search but find nothing.' };
  }
}
