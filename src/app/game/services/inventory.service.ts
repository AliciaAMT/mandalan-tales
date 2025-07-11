import { Injectable, signal, runInInjectionContext, Injector } from '@angular/core';
import { Firestore, collection, collectionData, query, where, addDoc, updateDoc, deleteDoc, doc, getDocs, getDoc } from '@angular/fire/firestore';
import { AuthService } from '../../services/auth.service';
import { CharacterService } from './character.service';
import { Inventory } from '../models/inventory.model';
import { CharStats } from '../models/charstats.model';

@Injectable({
  providedIn: 'root'
})
export class InventoryService {
  constructor(
    private firestore: Firestore,
    private authService: AuthService,
    private characterService: CharacterService,
    private injector: Injector
  ) {}

  // Signal for current character's inventory
  private inventorySignal = signal<Inventory[]>([]);

  // Getter for inventory
  get inventory() {
    return this.inventorySignal();
  }

  /**
   * Initialize inventory for a new character (called after character creation)
   */
  async initializeForNewCharacter(characterName: string): Promise<void> {
    const currentUser = this.authService.getCurrentUser();
    if (!currentUser) return;

    // Clear any existing inventory
    this.inventorySignal.set([]);

    // Initialize basic items
    await this.initializeBasicItems(characterName);

    // Save to Firestore
    await this.saveInventory();
  }

  /**
   * Load inventory for current character from Firestore
   */
  async loadInventory(): Promise<void> {
    const currentCharacter = this.getCurrentCharacter();
    if (!currentCharacter) {
      console.log('No current character found');
      this.inventorySignal.set([]);
      return;
    }

    try {
      console.log(`Loading inventory for character: ${currentCharacter.name}`);

      // Query Firestore for inventory items for this character
      const inventorySnapshot = await runInInjectionContext(this.injector, () => {
        const inventoryQuery = query(
          collection(this.firestore, 'inventory'),
          where('charname', '==', currentCharacter.name)
        );
        return getDocs(inventoryQuery);
      });
      const inventoryItems: Inventory[] = [];

      inventorySnapshot.forEach((doc) => {
        const data = doc.data() as Inventory;
        inventoryItems.push({
          ...data,
          id: doc.id
        });
      });

      console.log(`Loaded ${inventoryItems.length} inventory items from Firestore`);
      this.inventorySignal.set(inventoryItems);
    } catch (error) {
      console.error('Error loading inventory from Firestore:', error);
      this.inventorySignal.set([]);
    }
  }

  /**
   * Save inventory to Firestore
   */
  async saveInventory(): Promise<void> {
    const currentCharacter = this.getCurrentCharacter();
    if (!currentCharacter) return;

    try {
      console.log(`Saving inventory for character: ${currentCharacter.name}`);

      // For now, we'll just log the inventory since items are added individually
      // In a real implementation, you might want to batch update all items
      console.log('Current inventory to save:', this.inventory);
    } catch (error) {
      console.error('Error saving inventory to Firestore:', error);
    }
  }

  /**
   * Get current character from character service
   */
  private getCurrentCharacter(): CharStats | null {
    return this.characterService.getCurrentCharacter() || null;
  }

  /**
   * Add item to inventory
   */
  async addItem(item: Partial<Inventory>): Promise<boolean> {
    try {
      const currentCharacter = this.getCurrentCharacter();
      if (!currentCharacter) return false;

      // --- Container logic: set contentType/fixedContent for known containers ---
      if (item.itemname === 'Purse' || item.itemname === 'Money Purse') {
        item.contentType = 'gold';
        item.othertype = 'Container';
      }
      if (item.itemname === 'Locked Box') {
        item.contentType = 'fixed';
        item.fixedContent = 'Sharpened Bone Dagger';
        item.othertype = 'Container';
      }
      if (item.itemname === 'Chest' || item.itemname === 'Crate' || item.itemname === 'Sack' || item.itemname === 'Trunk' || item.itemname === 'Satchel' || item.itemname === 'Coffer') {
        item.contentType = 'random';
        item.othertype = 'Container';
      }
      if (item.itemname === 'Tinderbox') {
        item.contentType = 'NA';
      }

      console.log(`Adding item to inventory: ${item.itemname}`);

      // Check if item already exists in local inventory
      const existingItem = this.inventory.find(i =>
        i.itemname === item.itemname &&
        i.itemtype === item.itemtype
      );

      let docSnap: any = null;
      if (existingItem) {
        // Check if the Firestore document actually exists
        const docRef = doc(this.firestore, 'inventory', existingItem.id!);
        docSnap = await getDoc(docRef);

        if (docSnap.exists()) {
          // Update quantity in Firestore
          await runInInjectionContext(this.injector, () => {
            return updateDoc(docRef, {
              keep: existingItem.keep + (item.keep || 1)
            });
          });

          // Update local signal
          const updatedInventory = this.inventory.map(i =>
            i.id === existingItem.id
              ? { ...i, keep: i.keep + (item.keep || 1) }
              : i
          );
          this.inventorySignal.set(updatedInventory);

          console.log(`Updated quantity for ${item.itemname}`);
          return true;
        } else {
          // Document does not exist in Firestore, so remove stale item from local inventory
          this.inventorySignal.set(this.inventory.filter(i => i.id !== existingItem.id));
          // Continue to add as new below
        }
      }

      // Add new item to Firestore
      const newItem: Inventory = {
        charname: currentCharacter.name,
        itemname: item.itemname || '',
        itemdescription: item.itemdescription || '',
        itemtype: item.itemtype || 'Other',
        itemimage: item.itemimage || '',
        itemlevel: item.itemlevel || 1,
        itemrarity: item.itemrarity || 'Common',
        itemvalue: item.itemvalue || 0,
        keep: item.keep || 1,
        trade: item.trade || 0,
        equip: item.equip || 0,
        equiplocation: item.equiplocation || '',
        equiplh: item.equiplh || 0,
        equiprh: item.equiprh || 0,
        waterunits: item.waterunits || 0,
        maxwater: item.maxwater || 0,
        locklevel: item.locklevel || 0,
        keylock: item.keylock || 0,
        readable: item.readable || 0,
        consumable: item.consumable || 0,
        equipable: item.equipable || 0,
        combatuse: item.combatuse || 0,
        singleuse: item.singleuse || 0,
        weapontype: item.weapontype || '',
        armortype: item.armortype || '',
        acctype: item.acctype || '',
        othertype: item.othertype || '',
        weaponbase: item.weaponbase || 0,
        armorbase: item.armorbase || 0,
        accbase: item.accbase || 0,
        enhancement1: item.enhancement1 || '',
        enhancement2: item.enhancement2 || '',
        enhancement3: item.enhancement3 || '',
        enchantment1: item.enchantment1 || '',
        enchantment2: item.enchantment2 || '',
        enchantment3: item.enchantment3 || '',
        transmute1: item.transmute1 || '',
        transmute2: item.transmute2 || '',
        transmute3: item.transmute3 || '',
        adjustable: item.adjustable || 0,
        legendary: item.legendary || 0,
        relic: item.relic || 0,
        setitem: item.setitem || 0,
        damage: item.damage || 0,
        defense: item.defense || 0,
        penalty: item.penalty || 0,
        lightsource: item.lightsource || 0,
        thieving: item.thieving || 0,
        slow: item.slow || 0,
        curse: item.curse || 0,
        debility: item.debility || 0,
        weaken: item.weaken || 0,
        acid: item.acid || 0,
        acidcount: item.acidcount || 0,
        sleep: item.sleep || 0,
        sleepcount: item.sleepcount || 0,
        disease: item.disease || 0,
        blindness: item.blindness || 0,
        expbonus: item.expbonus || 0,
        invisible: item.invisible || 0,
        fire: item.fire || 0,
        fireresist: item.fireresist || 0,
        ice: item.ice || 0,
        iceresist: item.iceresist || 0,
        lightning: item.lightning || 0,
        lightningresist: item.lightningresist || 0,
        earth: item.earth || 0,
        earthresist: item.earthresist || 0,
        dark: item.dark || 0,
        darkresist: item.darkresist || 0,
        light: item.light || 0,
        lightresist: item.lightresist || 0,
        bleedresist: item.bleedresist || 0,
        knockback: item.knockback || 0,
        criticalhit: item.criticalhit || 0,
        backstab: item.backstab || 0,
        doublestrike: item.doublestrike || 0,
        triplestrike: item.triplestrike || 0,
        catapult: item.catapult || 0,
        bleed: item.bleed || 0,
        bleedcount: item.bleedcount || 0,
        physdamage: item.physdamage || 0,
        reflectphys: item.reflectphys || 0,
        reflectfire: item.reflectfire || 0,
        reflectice: item.reflectice || 0,
        reflectair: item.reflectair || 0,
        reflectearth: item.reflectearth || 0,
        reflectlight: item.reflectlight || 0,
        reflectdark: item.reflectdark || 0,
        vampiric: item.vampiric || 0,
        vampamount: item.vampamount || 0,
        manadrain: item.manadrain || 0,
        drainamount: item.drainamount || 0,
        duality: item.duality || 0,
        lightness: item.lightness || 0,
        longarm: item.longarm || 0,
        throwing: item.throwing || 0,
        ultimateresist: item.ultimateresist || 0,
        ultimatedamage: item.ultimatedamage || 0,
        ultimateboost: item.ultimateboost || 0,
        strength: item.strength || 0,
        speed: item.speed || 0,
        accuracy: item.accuracy || 0,
        agility: item.agility || 0,
        wisdom: item.wisdom || 0,
        life: item.life || 0,
        mana: item.mana || 0,
        liferegen: item.liferegen || 0,
        manaregen: item.manaregen || 0,
        blocking: item.blocking || 0,
        petrify: item.petrify || 0,
        paralyze: item.paralyze || 0,
        stun: item.stun || 0,
        fear: item.fear || 0,
        insanity: item.insanity || 0,
        lightfoot: item.lightfoot || 0,
        revivingjolt: item.revivingjolt || 0,
        refillinglight: item.refillinglight || 0,
        despair: item.despair || 0,
        tremors: item.tremors || 0,
        inferno: item.inferno || 0,
        infernocount: item.infernocount || 0,
        freezing: item.freezing || 0,
        freezecount: item.freezecount || 0,
        magicfind: item.magicfind || 0,
        greed: item.greed || 0,
        luck: item.luck || 0,
        lockpicking: item.lockpicking || 0,
        firestarter: item.firestarter || 0,
        heroicboost: item.heroicboost || 0,
        heroiccount: item.heroiccount || 0,
        silence: item.silence || 0,
        antique: item.antique || 0,
        webs: item.webs || 0,
        entanglement: item.entanglement || 0,
        waterbreathe: item.waterbreathe || 0,
        lasso: item.lasso || 0,
        adrenalinerush: item.adrenalinerush || 0,
        adrenalinecount: item.adrenalinecount || 0,
        distraction: item.distraction || 0,
        immobilizeresist: item.immobilizeresist || 0,
        mindresist: item.mindresist || 0,
        criticalresist: item.criticalresist || 0,
        horrifying: item.horrifying || 0,
        ultimaterevive: item.ultimaterevive || 0,
        swarming: item.swarming || 0,
        dryice: item.dryice || 0,
        coldblood: item.coldblood || 0,
        raginginferno: item.raginginferno || 0,
        smoke: item.smoke || 0,
        piercing: item.piercing || 0,
        sharpened: item.sharpened || 0,
        keen: item.keen || 0,
        devastating: item.devastating || 0,
        crushing: item.crushing || 0,
        itemrange: item.itemrange || 0,
        itemspeed: item.itemspeed || 0,
        levelling: item.levelling || 0,
        contentType: item.contentType || '',
        fixedContent: item.fixedContent || ''
      };

      const docRef = await runInInjectionContext(this.injector, () => {
        return addDoc(collection(this.firestore, 'inventory'), newItem);
      });

      const itemWithId = { ...newItem, id: docRef.id };
      this.inventorySignal.set([...this.inventory, itemWithId]);

      console.log(`Added new item: ${item.itemname}`);
      return true;
    } catch (error) {
      console.error('Error adding item to inventory:', error);
      return false;
    }
  }

  /**
   * Remove item from inventory
   */
  async removeItem(itemName: string, quantity: number = 1): Promise<boolean> {
    try {
      const item = this.inventory.find(i => i.itemname === itemName);
      if (!item) {
        console.log(`Item not found: ${itemName}`);
        return false;
      }

      if (item.keep <= quantity) {
        // Remove entire item from Firestore
        await runInInjectionContext(this.injector, () => {
          const docRef = doc(this.firestore, 'inventory', item.id!);
          return deleteDoc(docRef);
        });

        // Remove from local signal
        this.inventorySignal.set(this.inventory.filter(i => i.itemname !== itemName));
        console.log(`Removed item: ${itemName}`);
      } else {
        // Update quantity in Firestore
        await runInInjectionContext(this.injector, () => {
          const docRef = doc(this.firestore, 'inventory', item.id!);
          return updateDoc(docRef, {
            keep: item.keep - quantity
          });
        });

        // Update local signal
        const updatedInventory = this.inventory.map(i =>
          i.itemname === itemName
            ? { ...i, keep: i.keep - quantity }
            : i
        );
        this.inventorySignal.set(updatedInventory);
        console.log(`Removed ${quantity} of ${itemName}`);
      }

      return true;
    } catch (error) {
      console.error('Error removing item from inventory:', error);
      return false;
    }
  }

  /**
   * Check if character has item
   */
  hasItem(itemName: string, quantity: number = 1): boolean {
    const item = this.inventory.find(i => i.itemname === itemName);
    return item ? item.keep >= quantity : false;
  }

  /**
   * Create a basic item with default values
   */
  createBasicItem(
    name: string,
    description: string,
    type: string,
    image: string,
    quantity: number = 1,
    options: Partial<Inventory> = {}
  ): Partial<Inventory> {
    // --- Container logic: set contentType/fixedContent for known containers ---
    if (name === 'Purse' || name === 'Money Purse') {
      options.contentType = 'gold';
      options.othertype = 'Container';
    }
    if (name === 'Locked Box') {
      options.contentType = 'fixed';
      options.fixedContent = 'Sharpened Bone Dagger';
      options.othertype = 'Container';
    }
    if (name === 'Chest' || name === 'Crate' || name === 'Sack' || name === 'Trunk' || name === 'Satchel' || name === 'Coffer') {
      options.contentType = 'random';
      options.othertype = 'Container';
    }
    if (name === 'Tinderbox') {
      options.contentType = 'NA';
    }
    return {
      itemname: name,
      itemdescription: description,
      itemtype: type,
      itemimage: image,
      keep: quantity,
      ...options
    };
  }

  /**
   * Initialize basic items for a new character
   */
  async initializeBasicItems(characterName: string): Promise<void> {
    // New characters start with no inventory items
    // Items must be found through gameplay
  }

  /**
   * Update an item in Firestore by its ID
   */
  async updateItem(item: Inventory): Promise<void> {
    if (!item.id) throw new Error('Item must have an id to update');
    const docRef = doc(this.firestore, 'inventory', item.id);
    await runInInjectionContext(this.injector, () => updateDoc(docRef, { ...item }));
    // Update local signal
    const updatedInventory = this.inventory.map(i =>
      i.id === item.id ? { ...item } : i
    );
    this.inventorySignal.set(updatedInventory);
  }

  /**
   * Check if player has a specific key
   */
  hasKey(keyName: string): boolean {
    return this.inventory.some(item =>
      item.itemname === keyName && item.keep > 0
    );
  }

  /**
   * Check if player has lockpicks
   */
  hasLockpick(): boolean {
    return this.inventory.some(item =>
      item.itemname === 'Lockpick' && item.keep > 0
    );
  }

  /**
   * Get lockpicking skill from character stats
   */
  private getLockpickingSkill(): number {
    const currentCharacter = this.getCurrentCharacter();
    if (!currentCharacter) return 0;

    // Based on old demo logic: lockpicking + blockpicking + level + luck + bluck + bthieving
    return (currentCharacter.lockpicking || 0) +
           (currentCharacter.blockpicking || 0) +
           (currentCharacter.level || 0) +
           (currentCharacter.luck || 0) +
           (currentCharacter.bluck || 0) +
           (currentCharacter.bthieving || 0);
  }

  /**
   * Attempt to unlock a container with a key
   */
  async unlockWithKey(containerItem: Inventory, keyName: string): Promise<{ success: boolean; message: string; items?: any[] }> {
    if (!this.hasKey(keyName)) {
      return {
        success: false,
        message: `You do not have the ${keyName}. You cannot unlock this container.`
      };
    }

    // Remove the key
    await this.removeItem(keyName, 1);

    // Handle specific container types based on old demo
    if (containerItem.itemname === 'Locked Box') {
      return await this.handleLockedBoxUnlock(containerItem);
    }

    // Generic container unlock
    return await this.handleGenericContainerUnlock(containerItem);
  }

  /**
   * Attempt to lockpick a container
   */
  async lockpickContainer(containerItem: Inventory): Promise<{ success: boolean; message: string; items?: any[] }> {
    if (!this.hasLockpick()) {
      return {
        success: false,
        message: 'You do not have a lockpick.'
      };
    }

    const lockpickingSkill = this.getLockpickingSkill();
    const randomRoll = Math.floor(Math.random() * 20) + 1; // 1-20 like old demo

    if (lockpickingSkill < randomRoll) {
      // Failed lockpick attempt - break the lockpick
      await this.removeItem('Lockpick', 1);
      return {
        success: false,
        message: 'You attempt to pick the lock, but your lockpick broke.'
      };
    }

    // Successful lockpick
    await this.removeItem('Lockpick', 1);

    // Handle specific container types
    if (containerItem.itemname === 'Chest' && containerItem.locklevel > 0) {
      return await this.handleChestLockpick(containerItem);
    }

    // Generic container lockpick
    return await this.handleGenericContainerUnlock(containerItem);
  }

  /**
   * Handle unlocking the specific "Locked Box" from the old demo
   */
  private async handleLockedBoxUnlock(containerItem: Inventory): Promise<{ success: boolean; message: string; items?: any[] }> {
    const currentCharacter = this.getCurrentCharacter();
    if (!currentCharacter) {
      return { success: false, message: 'No character found.' };
    }

    // Add the Sharpened Bone Dagger (based on old demo)
    const daggerItem = this.createBasicItem(
      'Sharpened Bone Dagger',
      'This dagger appears to be particularly deadly.',
      'Weapon',
      'sharpdagger',
      1,
      {
        itemrarity: 'Relic',
        equipable: 1,
        equiplocation: 'Weapon',
        weapontype: 'Dagger',
        relic: 1,
        criticalhit: 25,
        duality: 1,
        sharpened: 2,
        itemrange: 0,
        itemspeed: 20,
        weaponbase: 4,
        itemvalue: 3 * 1 * 5, // 3 * level * 5
        damage: (4 * 1) + 2 // (weaponbase * level) + sharpened
      }
    );

    const success = await this.addItem(daggerItem);
    if (!success) {
      return { success: false, message: 'Your inventory is full.' };
    }

    // Remove the locked box
    await this.removeItem(containerItem.itemname, 1);

    // Give experience (based on old demo)
    await this.characterService.updateCharacter(currentCharacter.id!, {
      experience: (currentCharacter.experience || 0) + 5
    });

    return {
      success: true,
      message: 'You unlock the box with the key and find: Sharpened Bone Dagger (Level 1 Relic)',
      items: [{
        name: 'Sharpened Bone Dagger',
        description: 'This dagger appears to be particularly deadly.',
        image: 'sharpdagger',
        quantity: 1
      }]
    };
  }

  /**
   * Handle lockpicking the chest (based on old demo)
   */
  private async handleChestLockpick(containerItem: Inventory): Promise<{ success: boolean; message: string; items?: any[] }> {
    const currentCharacter = this.getCurrentCharacter();
    if (!currentCharacter) {
      return { success: false, message: 'No character found.' };
    }

    // Add the Family Crest Amulet (based on old demo)
    const amuletItem = this.createBasicItem(
      'Family Crest Amulet',
      'This Family Crest Amulet is decorated with precious gems and a carving of a dragon. It has a mystical glow and you can feel the magic radiating from it.',
      'Accessory',
      'familycrest',
      1,
      {
        itemrarity: 'Relic',
        itemvalue: 10000,
        equipable: 1,
        equiplocation: 'Neck',
        acctype: 'Amulet',
        accbase: 1,
        legendary: 1,
        relic: 1,
        defense: 1,
        lightsource: 1
      }
    );

    const success = await this.addItem(amuletItem);
    if (!success) {
      return { success: false, message: 'Your inventory is full.' };
    }

    // Give experience (based on old demo)
    await this.characterService.updateCharacter(currentCharacter.id!, {
      experience: (currentCharacter.experience || 0) + 5
    });

    return {
      success: true,
      message: 'You successfully pick the lock and find: Family Crest Amulet (Level 1 Relic)',
      items: [{
        name: 'Family Crest Amulet',
        description: 'This Family Crest Amulet is decorated with precious gems and a carving of a dragon.',
        image: 'familycrest',
        quantity: 1
      }]
    };
  }

  /**
   * Handle generic container unlock (for containers without specific logic)
   */
  private async handleGenericContainerUnlock(containerItem: Inventory): Promise<{ success: boolean; message: string; items?: any[] }> {
    // Use the existing container loot logic
    const loot = await this.generateContainerLoot(containerItem);

    // Remove the container
    await this.removeItem(containerItem.itemname, 1);

    return {
      success: true,
      message: 'You successfully unlock the container.',
      items: loot
    };
  }

  /**
   * Generate loot for a container (reuse existing logic)
   */
  private async generateContainerLoot(containerItem: Inventory): Promise<any[]> {
    // This would reuse the existing loot generation logic from handleContainerLoot
    // For now, return empty array - the actual loot logic is in the inventory page
    return [];
  }
}
