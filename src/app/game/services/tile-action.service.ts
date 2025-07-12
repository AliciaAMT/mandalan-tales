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
  isLocked?: boolean;
  lockpickItem?: string;
  lockpickSuccessItems?: {
    name: string;
    description: string;
    image: string;
    type: string;
    options?: any;
  }[];
  lockpickSuccessMessage?: string;
  lockpickFailMessage?: string;
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
        othertype: 'Container',
        contentType: 'fixed',
        fixedContent: 'Sharpened Bone Dagger'
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
      items: [
        {
          name: 'Worn Canvas Shirt',
          description: 'This is an ordinary Canvas Shirt, a little worn for the wear.',
          image: 'worncanvasshirt',
          type: 'Armor',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            equiplocation: 'Chest',
            equipable: 1,
            weapontype: 'None',
            armortype: 'Chest',
            armorbase: 3
          }
        },
        {
          name: 'Worn Canvas Pants',
          description: 'This is an ordinary pair of Canvas Pants, a little worn for the wear.',
          image: 'worncanvaspants',
          type: 'Armor',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            equiplocation: 'Legs',
            equipable: 1,
            weapontype: 'None',
            armortype: 'Legs',
            armorbase: 3
          }
        }
      ],
      flagKey: 'bedroomwardrobe',
      experience: 10,
      message: 'You search the wardrobe and find a worn canvas shirt and pants.',
      alreadyFoundMessage: 'You search the wardrobe but find nothing.'
    },
    {
      map: 'homeup',
      x: 3,
      y: 2,
      action: 'search',
      items: [
        {
          name: 'Small Waterskin',
          description: 'This water container holds about one eight-hour serving of water, and it is refillable.',
          image: 'smallwaterskin',
          type: 'Food',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            maxwater: 1,
            othertype: 'Water'
          }
        },
        {
          name: 'Lockpick',
          description: 'A simple lockpick, useful for opening locked containers.',
          image: 'lockpick',
          type: 'Other',
          options: {
            itemrarity: 'Common',
            itemlevel: 1,
            keep: 3,
            othertype: 'Tool'
          }
        }
      ],
      flagKey: 'bedroomdesk',
      experience: 10,
      message: 'You search the desk and find a small waterskin and 3 lockpicks.',
      alreadyFoundMessage: 'You search the desk but find nothing.'
    },
    // Coatrack at homeup (1,2) - gives Worn Canvas Cloak and Worn Canvas Hat
    {
      map: 'homeup',
      x: 1,
      y: 2,
      action: 'search',
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
      message: 'You search the coatrack and find a worn canvas cloak and hat.',
      alreadyFoundMessage: 'You search the coat rack but find nothing.'
    },
    // Shelf at homeup (3,3) - gives Book of Laws
    {
      map: 'homeup',
      x: 3,
      y: 3,
      action: 'search',
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
      message: 'You search the shelf and find a book of laws.',
      alreadyFoundMessage: 'You search the shelf but find nothing.'
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
    },
    // --- Home map actions ---
    {
      map: 'home', x: 1, y: 1, action: 'search',
      itemName: 'Family History Book',
      itemDescription: 'This is your family\'s history book. It makes for interesting reading considering you do not know anything about your new family!',
      itemImage: 'book', itemType: 'Other',
      itemOptions: { itemrarity: 'Relic', itemlevel: 1, readable: 1, othertype: 'Book' },
      flagKey: 'homeshelf', experience: 5,
      message: 'You search the shelf and find a family history book.',
      alreadyFoundMessage: 'You search the Shelf but find nothing.'
    },
    {
      map: 'home', x: 2, y: 1, action: 'search',
      itemName: 'Lockpick',
      itemDescription: 'A simple lockpick, useful for opening locked containers.',
      itemImage: 'lockpick', itemType: 'Other',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, othertype: 'Tool' },
      flagKey: 'homerug', experience: 5,
      message: 'You search under the rug and find a lockpick.',
      alreadyFoundMessage: 'You search under the Rug but find nothing.'
    },
    {
      map: 'home', x: 3, y: 1, action: 'search',
      itemName: 'Chest',
      itemDescription: 'A locked chest. It looks like it requires a lockpick to open.',
      itemImage: 'chest', itemType: 'Other',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, keylock: 1, othertype: 'Container', contentType: 'random' },
      flagKey: 'homechest', experience: 5,
      message: 'You search the chest. It is locked. You need a lockpick to open it.',
      alreadyFoundMessage: 'You search the Chest but find nothing.',
      isLocked: true,
      lockpickItem: 'Lockpick',
      lockpickSuccessItems: [
        {
          name: 'Family Crest Amulet',
          description: 'This Family Crest Amulet is decorated with precious gems and a carving of a dragon. It has a mystical glow and you can feel the magic radiating from it.',
          image: 'familycrest',
          type: 'Accessory',
          options: {
            itemrarity: 'Relic',
            itemlevel: 1,
            equiplocation: 'Neck',
            equipable: 1,
            acctype: 'Amulet',
            accbase: 1,
            legendary: 1,
            relic: 1,
            defense: 1,
            lightsource: 1,
            itemvalue: 10000
          }
        }
      ],
      lockpickSuccessMessage: 'You unlock the chest and find a Family Crest Amulet!',
      lockpickFailMessage: 'You attempt to pick the lock, but your lockpick broke.',
      questFlagKey: 'quest4',
      questFlagValue: 1
    },
    {
      map: 'home', x: 1, y: 2, action: 'search',
      items: [
        { name: 'Iron Skillet', description: 'With this Iron Skillet and a fire source you can fry many foods.', image: 'skillet', type: 'Other', options: { itemrarity: 'Common', itemlevel: 1, othertype: 'Cooking' } },
        { name: 'Cooking Oil', description: 'This type of cooking oil is needed for various recipes.', image: 'oil', type: 'Food', options: { itemrarity: 'Common', itemlevel: 1, singleuse: 1, othertype: 'Ingredient' } }
      ],
      flagKey: 'homeshelf2', experience: 10,
      message: 'You search the shelf and find an iron skillet and cooking oil.',
      alreadyFoundMessage: 'You search the Shelf but find nothing.'
    },
    {
      map: 'home', x: 2, y: 2, action: 'search',
      itemName: 'Rusty Kitchen Knife',
      itemDescription: 'This kitchen knife is quite rusty. It won\'t do much damage, but it is a weapon none the less.',
      itemImage: 'rustyknife', itemType: 'Weapon',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, equiplocation: 'Weapon', equipable: 1, weapontype: 'Blade', weaponbase: 2, damage: 2, duality: 1, itemrange: 0, itemspeed: 10 },
      flagKey: 'hometable', experience: 5,
      message: 'You search the table and find a rusty kitchen knife.',
      alreadyFoundMessage: 'You search the Table but find nothing.'
    },
    {
      map: 'home', x: 3, y: 2, action: 'search',
      items: [
        { name: 'Tinderbox', description: 'This tinderbox contains items to start a fire including flint and tinder.', image: 'tinderbox', type: 'Other', options: { itemrarity: 'Common', itemlevel: 1, othertype: 'Container', contentType: 'NA' } },
        { name: 'Firewood', description: 'With firewood and flint you can start a fire in the proper area such as a fireplace or campsite.', image: 'firewood', type: 'Other', options: { itemrarity: 'Common', itemlevel: 1, keep: 3, othertype: 'Firewood' } }
      ],
      flagKey: 'homefireplace', experience: 10,
      message: 'You search the fireplace and find a tinderbox and firewood.',
      alreadyFoundMessage: 'You search the Fireplace but find nothing.'
    },
    {
      map: 'home', x: 1, y: 3, action: 'search',
      items: [
        { name: 'Raw Meat', description: 'This meat needs to be cooked before eaten.', image: 'meat', type: 'Food', options: { itemrarity: 'Common', itemlevel: 1, keep: 2, othertype: 'Ingredient' } },
        { name: 'Bread', description: 'This is regular wheat bread.', image: 'bread', type: 'Food', options: { itemrarity: 'Common', itemlevel: 1, keep: 6, consumable: 1, singleuse: 1, othertype: 'Consumable', enhancement1: 'Life: +5', enhancement2: 'Mana: +5' } }
      ],
      flagKey: 'homepantry', experience: 10,
      message: 'You search the kitchen pantry and find raw meat and bread.',
      alreadyFoundMessage: 'You search the Kitchen Pantry but find nothing.'
    },
    {
      map: 'home', x: 2, y: 3, action: 'search',
      items: [
        { name: 'Cinnamon', description: 'This spice is an important ingredient for flavour for many recipes.', image: 'cinnamon', type: 'Food', options: { itemrarity: 'Common', itemlevel: 1, keep: 2, othertype: 'Ingredient' } },
        { name: 'Salt', description: 'Salt is a very important ingredient to many recipes and potions.', image: 'salt', type: 'Food', options: { itemrarity: 'Common', itemlevel: 1, keep: 3, othertype: 'Ingredient' } }
      ],
      flagKey: 'homerack', experience: 10,
      message: 'You search the herb rack and find cinnamon and salt.',
      alreadyFoundMessage: 'You search the Herb Rack but find nothing.'
    },
    {
      map: 'home', x: 3, y: 3, action: 'search',
      itemName: 'Purse',
      itemDescription: 'The only way to know what this purse contains is to open it.',
      itemImage: 'purse', itemType: 'Other',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, othertype: 'Container', contentType: 'gold' },
      flagKey: 'homedrawer', experience: 5,
      message: 'You search the end table drawer and find a purse.',
      alreadyFoundMessage: 'You search the End Table Drawer but find nothing.'
    },
    // --- Yard map actions ---
    {
      map: 'yard', x: 3, y: 3, action: 'search',
      itemName: 'Bone Key',
      itemDescription: 'This key appears to be made out of Bone, and is shaped like a bone as well.',
      itemImage: 'bonekey', itemType: 'Other',
      itemOptions: { itemrarity: 'Unique', itemlevel: 2, othertype: 'Key' },
      experience: 5,
      message: 'You search Shep\'s dog house and find a bone key.',
      alreadyFoundMessage: 'You search Shep\'s Dog House but find nothing.'
    },
    {
      map: 'yard', x: 2, y: 1, action: 'search',
      itemName: 'Lettuce',
      itemDescription: 'Lettuce may be consumed raw, but is much better in a recipe or salad.',
      itemImage: 'lettuce', itemType: 'Food',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, keep: 3, consumable: 1, singleuse: 1, othertype: 'Consumable', enhancement1: 'Mana +5' },
      flagKey: 'yardgarden', experience: 5,
      message: 'You search the garden and find lettuce.',
      alreadyFoundMessage: 'You search the Garden but find nothing.'
    },
    {
      map: 'yard', x: 1, y: 2, action: 'search',
      itemName: 'Melon',
      itemDescription: 'Melons may be consumed raw or cooked in recipes.',
      itemImage: 'melon', itemType: 'Food',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, keep: 3, consumable: 1, singleuse: 1, othertype: 'Consumable', enhancement1: 'Life +5', enhancement2: 'Mana +5' },
      flagKey: 'yardmelon', experience: 5,
      message: 'You search the melon vines and find melons.',
      alreadyFoundMessage: 'You search the Melon Vines but find nothing.'
    },
    {
      map: 'yard', x: 3, y: 1, action: 'search',
      itemName: 'Apple',
      itemDescription: 'Apples may be consumed raw or cooked in recipes.',
      itemImage: 'apple', itemType: 'Food',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, keep: 3, consumable: 1, singleuse: 1, othertype: 'Consumable', enhancement1: 'Life +5' },
      flagKey: 'yardtrees', experience: 5,
      message: 'You search the fruit tree and find apples.',
      alreadyFoundMessage: 'You search the Fruit Trees but find nothing.'
    },
    {
      map: 'yard', x: 3, y: 2, action: 'search',
      itemName: 'Egg',
      itemDescription: 'Eggs must be cooked in order to be eaten.',
      itemImage: 'egg', itemType: 'Food',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, keep: 3, othertype: 'Ingredient' },
      flagKey: 'yardcoop', experience: 5,
      message: 'You search the chicken coop and find eggs.',
      alreadyFoundMessage: 'You search the Chicken Coop but find nothing.'
    },
    // --- Cellar map actions ---
    {
      map: 'cellar', x: 1, y: 1, action: 'search',
      itemName: 'Dry Rice',
      itemDescription: 'Dry Rice must be cooked before eaten.',
      itemImage: 'rice', itemType: 'Food',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, keep: 10, othertype: 'Ingredient' },
      flagKey: 'cellarrice', experience: 5,
      message: 'You search the canvas bag and find dry rice.',
      alreadyFoundMessage: 'You search the Canvas Bag but find nothing.'
    },
    {
      map: 'cellar', x: 3, y: 1, action: 'search',
      itemName: 'Vegetable',
      itemDescription: 'The various vegetables you find may be consumed raw or cooked in recipes.',
      itemImage: 'vegetables', itemType: 'Food',
      itemOptions: { itemrarity: 'Common', itemlevel: 1, keep: 5, consumable: 1, singleuse: 1, othertype: 'Consumable', enhancement1: 'Life +5', enhancement2: 'Mana +5' },
      flagKey: 'cellarveggie', experience: 5,
      message: 'You search the canvas bag and find vegetables.',
      alreadyFoundMessage: 'You search the Canvas Bag but find nothing.'
    },
    // --- Water sources (special actions that restore health/mana and fill water containers) ---
    {
      map: 'homeup', x: 2, y: 1, action: 'search',
      flagKey: 'homeupwaterbarrel', experience: 0,
      message: 'You drink until you are refreshed, and you fill all of your water containers.',
      alreadyFoundMessage: 'You have already used this water source recently.'
    },
    {
      map: 'yard', x: 2, y: 2, action: 'search',
      flagKey: 'yardwell', experience: 0,
      message: 'You drink until you are refreshed, and you fill all of your water containers.',
      alreadyFoundMessage: 'You have already used this water source recently.'
    },
    {
      map: 'cellar', x: 1, y: 4, action: 'search',
      flagKey: 'cellarbarrel', experience: 0,
      message: 'You drink until you are refreshed, and you fill all of your water containers.',
      alreadyFoundMessage: 'You have already used this water source recently.'
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
   * Get tile action for a specific map and coordinates (ignores action string for efficiency and robustness)
   */
  getTileAction(map: string, x: number, y: number): TileAction | null {
    if (!map || !x || !y) {
      console.warn('Invalid parameters for getTileAction:', { map, x, y });
      return null;
    }
    const mapActions = this.tileActionLookup.get(map);
    if (!mapActions) return null;
    const coordKey = `${x},${y}`;
    const coordActions = mapActions.get(coordKey);
    if (!coordActions) return null;
    // Return the first action defined for this tile (should only be one per tile)
    return Array.from(coordActions.values())[0] || null;
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
    if (!flags) {
      console.warn('No flags found for character', characterName);
      return false;
    }

    const flagValue = flags[tileAction.flagKey as keyof typeof flags];
    console.log('[DEBUG] isItemAlreadyFound:', {
      characterName,
      flagKey: tileAction.flagKey,
      flagValue,
      flags
    });
    // Check if flag is greater than 0 (meaning item has been found)
    // This matches the old demo logic where flags were set to 1, 2, etc.
    return typeof flagValue === 'number' && flagValue > 0;
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
   * Handle water sources (restore health/mana and fill water containers)
   */
  private async handleWaterSource(tileAction: TileAction, characterName: string): Promise<void> {
    // Restore full health and mana
    const characters = this.characterService.getCharacters();
    const character = characters.find(c => c.name === characterName);
    if (character && character.id) {
      await this.characterService.updateCharacter(character.id, {
        life: character.maxLife,
        mana: character.maxMana
      });
    }

    // Fill all water containers to maximum capacity
    const inventory = this.inventoryService.inventory;
    for (const item of inventory) {
      if (item.maxwater && item.maxwater > 0) {
        item.waterunits = item.maxwater;
      }
    }
    await this.inventoryService.saveInventory();

    // Set the flag to prevent using the water source again
    if (tileAction.flagKey) {
      await this.characterService.setCharacterFlag(characterName, tileAction.flagKey as any, 1);
    }
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

  /**
   * Handle locked chest lockpicking
   */
  private async handleLockedChest(tileAction: TileAction, characterName: string): Promise<TileActionResult> {
    // Check if player has the required lockpick
    if (!tileAction.lockpickItem) {
      return { message: 'This chest requires a lockpick to open.', items: [], success: false };
    }

    const hasLockpick = this.inventoryService.hasItem(tileAction.lockpickItem);
    if (!hasLockpick) {
      return { message: `You do not have a ${tileAction.lockpickItem}.`, items: [], success: false };
    }

    // Get character stats for lockpicking calculation
    const characters = this.characterService.getCharacters();
    const character = characters.find(c => c.name === characterName);
    if (!character) {
      return { message: 'Character not found.', items: [], success: false };
    }

    // Calculate lockpicking skill (matching old demo logic)
    const lockpickingSkill = (character.lockpicking || 0) +
                            (character.blockpicking || 0) +
                            character.level +
                            (character.luck || 0) +
                            (character.bluck || 0) +
                            (character.bthieving || 0);

    // Roll against difficulty (1-20, matching old demo)
    const difficulty = Math.floor(Math.random() * 20) + 1;
    const success = lockpickingSkill >= difficulty;

    if (success) {
      // Success: Give items and experience
      const foundItems: any[] = [];

      if (tileAction.lockpickSuccessItems) {
        for (const itemData of tileAction.lockpickSuccessItems) {
          const item = this.inventoryService.createBasicItem(
            itemData.name,
            itemData.description,
            itemData.type,
            itemData.image,
            1,
            itemData.options || {}
          );

          const itemSuccess = await this.inventoryService.addItem(item);
          if (itemSuccess) {
            foundItems.push({
              name: itemData.name,
              description: itemData.description,
              image: itemData.image,
              quantity: 1
            });
          }
        }
      }

      // Set flags
      await this.setItemFlags(tileAction, characterName);

      // Give experience points
      if (tileAction.experience && tileAction.experience > 0) {
        await this.characterService.updateCharacter(character.id!, {
          experience: character.experience + tileAction.experience
        });
      }

      return {
        message: tileAction.lockpickSuccessMessage || 'You successfully pick the lock!',
        items: foundItems,
        success: true
      };
    } else {
      // Failure: Break lockpick and show failure message
      await this.inventoryService.removeItem(tileAction.lockpickItem, 1);

      return {
        message: tileAction.lockpickFailMessage || 'Your lockpick broke!',
        items: [],
        success: false
      };
    }
  }

  /**
   * Handle tile action for a specific map and coordinates (ignores action string)
   */
  public async handleTileAction(map: string, x: number, y: number, characterName: string): Promise<TileActionResult> {
    console.log('[DEBUG] handleTileAction called:', { map, x, y, characterName });
    const tileAction = this.getTileAction(map, x, y);
    if (!tileAction) {
      return { message: 'There is nothing to find here.', items: [], success: false };
    }

    // Special handling for dog house (yard, 3, 3)
    if (map === 'yard' && x === 3 && y === 3) {
      return await this.handleDogHouseInteraction(characterName);
    }

    const alreadyFound = await this.isItemAlreadyFound(tileAction, characterName);
    if (alreadyFound) {
      return { message: tileAction.alreadyFoundMessage || 'You find nothing new.', items: [], success: false };
    }

    // Handle locked chests specially
    if (tileAction.isLocked) {
      return await this.handleLockedChest(tileAction, characterName);
    }

    // Handle water sources specially (restore health/mana and fill water containers)
    if (tileAction.flagKey && tileAction.flagKey.includes('water') || tileAction.flagKey?.includes('well') || tileAction.flagKey?.includes('barrel')) {
      await this.handleWaterSource(tileAction, characterName);
      return { message: tileAction.message, items: [], success: true };
    }

    const items = await this.giveItemsToPlayer(tileAction, characterName);
    await this.setItemFlags(tileAction, characterName);

    // Give experience points if specified
    if (tileAction.experience && tileAction.experience > 0) {
      const characters = this.characterService.getCharacters();
      const character = characters.find(c => c.name === characterName);
      if (character && character.id) {
        await this.characterService.updateCharacter(character.id, {
          experience: character.experience + tileAction.experience
        });
      }
    }

    return { message: tileAction.message, items, success: true };
  }

  /**
   * Handle dog house interaction based on Old Shep's feeding state
   */
  private async handleDogHouseInteraction(characterName: string): Promise<TileActionResult> {
    const flags = await this.characterService.getCharacterFlags(characterName);
    const shepfeedState = flags?.shepfeed || 0;

    if (shepfeedState === 0) {
      // Old Shep bites you - lose 5 life
      const characters = this.characterService.getCharacters();
      const character = characters.find(c => c.name === characterName);
      if (character && character.id) {
        const newLife = Math.max(0, character.life - 5);
        await this.characterService.updateCharacter(character.id, {
          life: newLife
        });
      }

      return {
        message: 'You search the dog house and notice something strange in Shep\'s food bowl. You reach into the little house to get the strange item when Old Shep snarls and bites you! Maybe Old Shep is hungry. He sure took a bite out of your arm! -5 Life',
        items: [],
        success: false
      };
    } else if (shepfeedState === 1) {
      // Get the bone key
      const boneKeyItem = this.inventoryService.createBasicItem(
        'Bone Key',
        'This key appears to be made out of Bone, and is shaped like a bone as well.',
        'Other',
        'bonekey',
        1,
        { itemrarity: 'Unique', itemlevel: 2, othertype: 'Key' }
      );

      const itemSuccess = await this.inventoryService.addItem(boneKeyItem);
      if (!itemSuccess) {
        return {
          message: 'Your inventory is full. Cannot add the bone key.',
          items: [],
          success: false
        };
      }

      // Set shepfeed to 2 (key found)
      await this.characterService.setCharacterFlag(characterName, 'shepfeed', 2);

      // Give experience
      const characters = this.characterService.getCharacters();
      const character = characters.find(c => c.name === characterName);
      if (character && character.id) {
        await this.characterService.updateCharacter(character.id, {
          experience: character.experience + 5
        });
      }

      return {
        message: 'You search the dog house and notice something strange in Shep\'s food bowl. You reach into the little house to get the strange item and find a bone key!',
        items: [{
          name: 'Bone Key',
          description: 'This key appears to be made out of Bone, and is shaped like a bone as well.',
          image: 'bonekey',
          quantity: 1
        }],
        success: true
      };
    } else {
      // Already found the key (shepfeed === 2)
      return {
        message: 'You search Shep\'s Dog House but find nothing.',
        items: [],
        success: false
      };
    }
  }
}
