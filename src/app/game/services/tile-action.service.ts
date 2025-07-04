import { Injectable, inject } from '@angular/core';
import { CharacterService } from './character.service';
import { InventoryService } from './inventory.service';
import { PortalService } from './portal.service';

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

export interface TileActionResult {
  message: string;
  items?: any[];
  success: boolean;
}

@Injectable({ providedIn: 'root' })
export class TileActionService {
  private characterService = inject(CharacterService);
  private inventoryService = inject(InventoryService);
  private portalService = inject(PortalService);

  // Optimized lookup structure: Map -> Coordinates -> Action -> TileAction
  private tileActionLookup: Map<string, Map<string, Map<string, TileAction>>> = new Map();

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

  constructor() {
    this.buildTileActionLookup();
  }

  /**
   * Build optimized lookup structure for fast tile action retrieval
   */
  private buildTileActionLookup(): void {
    for (const tileAction of this.tileActions) {
      const mapKey = tileAction.map;
      const coordKey = `${tileAction.x},${tileAction.y}`;
      const actionKey = tileAction.action;

      // Initialize map if it doesn't exist
      if (!this.tileActionLookup.has(mapKey)) {
        this.tileActionLookup.set(mapKey, new Map());
      }

      // Initialize coordinates if they don't exist
      const mapActions = this.tileActionLookup.get(mapKey)!;
      if (!mapActions.has(coordKey)) {
        mapActions.set(coordKey, new Map());
      }

      // Add the tile action
      const coordActions = mapActions.get(coordKey)!;
      coordActions.set(actionKey, tileAction);
    }
  }

  /**
   * Main method to handle tile actions that may yield items
   */
  async handleTileAction(
    map: string,
    x: number,
    y: number,
    action: string,
    characterName?: string
  ): Promise<TileActionResult> {
    const tileAction = this.getTileAction(map, x, y, action);

    if (!tileAction) {
      return {
        message: `You ${action} but find nothing of interest.`,
        success: false
      };
    }

    if (!characterName) {
      return {
        message: tileAction.message,
        success: true
      };
    }

    // Check if already found
    if (await this.isItemAlreadyFound(tileAction, characterName)) {
      return {
        message: tileAction.alreadyFoundMessage || 'You search but find nothing.',
        success: false
      };
    }

    // Give items to player
    const foundItems = await this.giveItemsToPlayer(tileAction, characterName);

    if (foundItems.length === 0) {
      return {
        message: 'You find items but your inventory is full.',
        success: false
      };
    }

    // Set flags to prevent finding items again
    await this.setItemFlags(tileAction, characterName);

    return {
      message: tileAction.message,
      items: foundItems,
      success: true
    };
  }

  /**
   * Get tile action for a specific map and coordinates using optimized lookup
   */
  getTileAction(map: string, x: number, y: number, action: string): TileAction | null {
    // Fallback for invalid map
    if (!map || !x || !y || !action) {
      console.warn('Invalid parameters for getTileAction:', { map, x, y, action });
      return null;
    }

    const mapActions = this.tileActionLookup.get(map);
    if (!mapActions) {
      return null;
    }

    const coordKey = `${x},${y}`;
    const coordActions = mapActions.get(coordKey);
    if (!coordActions) {
      return null;
    }

    return coordActions.get(action) || null;
  }

  /**
   * Get all tile actions for a specific map (useful for debugging or bulk operations)
   */
  getTileActionsForMap(map: string): TileAction[] {
    const mapActions = this.tileActionLookup.get(map);
    if (!mapActions) {
      return [];
    }

    const actions: TileAction[] = [];
    for (const coordActions of mapActions.values()) {
      for (const tileAction of coordActions.values()) {
        actions.push(tileAction);
      }
    }
    return actions;
  }

  /**
   * Check if there are any tile actions for a specific map and coordinates
   */
  hasTileActions(map: string, x: number, y: number): boolean {
    const mapActions = this.tileActionLookup.get(map);
    if (!mapActions) {
      return false;
    }

    const coordKey = `${x},${y}`;
    return mapActions.has(coordKey);
  }

  /**
   * Check if the item has already been found by checking flags
   */
  private async isItemAlreadyFound(tileAction: TileAction, characterName: string): Promise<boolean> {
    if (!tileAction.flagKey) {
      return false;
    }

    const flags = await this.characterService.getCharacterFlags(characterName);
    return !!flags && !!flags[tileAction.flagKey as keyof typeof flags];
  }

  /**
   * Give items to the player and return the list of found items
   */
  private async giveItemsToPlayer(tileAction: TileAction, characterName: string): Promise<any[]> {
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

    return foundItems;
  }

  /**
   * Set flags to prevent finding items again and update quest progress
   */
  private async setItemFlags(tileAction: TileAction, characterName: string): Promise<void> {
    // Set the main flag to prevent finding the item again
    if (tileAction.flagKey) {
      await this.characterService.setCharacterFlag(characterName, tileAction.flagKey as any, 1);
    }

    // Update quest flag if this action advances a quest
    if (tileAction.questFlagKey && tileAction.questFlagValue) {
      const flags = await this.characterService.getCharacterFlags(characterName);
      if (flags?.[tileAction.questFlagKey as keyof typeof flags] === 0) {
        await this.characterService.setCharacterFlag(
          characterName,
          tileAction.questFlagKey as any,
          tileAction.questFlagValue
        );
      }
    }
  }

  /**
   * Check if there's a portal at the given coordinates
   */
  hasPortal(map: string, x: number, y: number): boolean {
    return this.portalService.hasPortal(map, x, y);
  }

  /**
   * Get portal action for the given coordinates
   */
  getPortalAction(map: string, x: number, y: number) {
    return this.portalService.getPortalAction(map, x, y);
  }

  /**
   * Handle portal action
   */
  async handlePortalAction(portal: any, characterName: string): Promise<{ success: boolean; message: string }> {
    return await this.portalService.usePortal(portal, characterName);
  }

  /**
   * Check portal requirements
   */
  async checkPortalRequirements(portal: any, characterName: string): Promise<{ canUse: boolean; message?: string }> {
    return await this.portalService.checkPortalRequirements(portal, characterName);
  }

  /**
   * Get user-friendly name for a map
   */
  getMapDisplayName(map: string): string {
    return this.portalService.getMapDisplayName(map);
  }
}
