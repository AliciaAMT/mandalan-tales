import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule, ModalController } from '@ionic/angular';
import { Router, RouterModule } from '@angular/router';
import { AuthService } from '../../../services/auth.service';
import { SettingsService } from '../../../game/services/settings.service';
import { InventoryService } from '../../../game/services/inventory.service';
import { CharacterService } from '../../../game/services/character.service';
import { Inventory } from '../../../game/models/inventory.model';
import { FocusManagerDirective } from '../../../shared/focus-manager.directive';
import { ItemDetailsModalComponent } from './item-details-modal.component';
import { ContainerModalComponent } from './container-modal.component';
import { ResultModalComponent } from './result-modal.component';
import { rollLoot, LootItem } from '../../../game/services/loot-tables';
import { EquipItemModalComponent } from './equip-item-modal.component';

@Component({
  selector: 'app-inventory',
  standalone: true,
  imports: [CommonModule, IonicModule, RouterModule, FocusManagerDirective, ItemDetailsModalComponent, ContainerModalComponent, EquipItemModalComponent],
  templateUrl: './inventory.page.html',
  styleUrls: ['./inventory.page.scss']
})
export class InventoryPage implements OnInit {
  private router = inject(Router);
  private authService = inject(AuthService);
  private settingsService = inject(SettingsService);
  public inventoryService = inject(InventoryService);
  private modalCtrl = inject(ModalController);
  private characterService = inject(CharacterService);

  constructor() {
    // Initialize any required services
  }

  // Collapsible sections state
  isKeepPocketOpen = true;
  isTradePocketOpen = false;
  isFoodPocketOpen = false;
  isEquippedItemsOpen = true;

  // Filter properties (based on old demo)
  keepFilter = 'All';
  tradeFilter = 'All';
  foodFilter = 'All';

  // Real inventory data
  keepPocketItems: Inventory[] = [];
  tradePocketItems: Inventory[] = [];
  foodPocketItems: Inventory[] = [];

  selectedItem: Inventory | null = null;

  containerModalOpen = false;
  containerModalItem: Inventory | null = null;
  containerModalHasKey = false;
  containerModalHasLockpick = false;
  containerModalFoundItems: string[] = [];
  containerModalOpened = false; // Track if container has been opened
  itemDetailsLootResult: string[] = []; // Track loot result for item details modal

  equipModalOpen = false;
  equipModalSlot: string | null = null;
  equipModalItems: Inventory[] = [];

  async openContainerModal(item: Inventory) {
    console.log('openContainerModal called', item);
    console.log('item.keylock:', item.keylock);
    console.log('item.othertype:', item.othertype);
    console.log('item.contentType:', item.contentType);

    // Handle container opening directly in the item details modal
    if (item.keylock === 0 && item.othertype === 'Container') {
      await this.handleContainerLoot(item);
      // Keep the item details modal open to show the result
      return;
    }

    // For locked containers, open the container modal
    this.containerModalItem = item;

    // Check for keys based on container type
    let hasKey = false;
    if (item.itemname === 'Locked Box') {
      hasKey = this.inventoryService.hasKey('Small Rusty Key');
    } else if (item.itemname === 'Chest') {
      hasKey = this.inventoryService.hasKey('Chest Key') || this.inventoryService.hasKey('Key');
    } else {
      hasKey = this.inventoryService.hasKey('Key') || this.inventoryService.hasKey('Generic Key');
    }

    this.containerModalHasKey = hasKey;
    this.containerModalHasLockpick = this.inventoryService.hasLockpick();
    this.containerModalFoundItems = [];
    this.containerModalOpen = true;
  }

  async handleContainerLoot(item: Inventory) {
    // --- Loot logic ---
    if (item.keylock === 0 && item.othertype === 'Container') {
      if (item.contentType === 'gold') {
        const gold = rollLoot('gold');
        console.log('[Container Gold Roll]', gold);
        if (typeof gold === 'number' && gold > 0) {
          const char = this.characterService.getCurrentCharacter();
          if (char) {
            await this.characterService.updateCharacter(char.id!, { gold: (char.gold || 0) + gold });
            this.itemDetailsLootResult = [`You found ${gold} gold coins!`];
            await this.inventoryService.removeItem(item.itemname, 1);
          } else {
            this.itemDetailsLootResult = ['No character found to add gold.'];
          }
        } else {
          this.itemDetailsLootResult = ['No gold found.'];
          await this.inventoryService.removeItem(item.itemname, 1);
        }
      } else if (item.contentType === 'random') {
        const loot = rollLoot('random');
        console.log('[Container Random Loot Roll]', loot);
        if (loot && typeof loot === 'object') {
          await this.inventoryService.addItem({
            itemname: loot.name,
            itemdescription: loot.description,
            itemtype: loot.type,
            itemimage: loot.image,
            itemlevel: loot.level,
            itemrarity: loot.rarity,
            itemvalue: loot.value,
            keep: 1,
            ['equipable']: loot['equipable'] || 0,
            ['equiplocation']: loot['equiplocation'] || '',
            ['weapontype']: loot['weapontype'] || '',
            ['armortype']: loot['armortype'] || '',
            ['acctype']: loot['acctype'] || '',
            ['enhancement1']: loot['enhancement1'] || '',
            ['enhancement2']: loot['enhancement2'] || '',
            ['enhancement3']: loot['enhancement3'] || '',
            ['legendary']: loot['legendary'] || 0
          });
          this.itemDetailsLootResult = [`You found: ${loot.name} (Level ${loot.level} ${loot.rarity})`];
          await this.inventoryService.removeItem(item.itemname, 1);
        } else {
          this.itemDetailsLootResult = ['The container is empty.'];
          await this.inventoryService.removeItem(item.itemname, 1);
        }
      } else if (item.contentType === 'fixed' && item.fixedContent) {
        await this.inventoryService.addItem({
          itemname: item.fixedContent,
          itemdescription: 'A special item found in a fixed-content container.',
          itemtype: 'Other',
          itemimage: '',
          itemlevel: 1,
          itemrarity: 'Relic',
          itemvalue: 0,
          keep: 1
        });
        this.itemDetailsLootResult = [item.fixedContent];
        await this.inventoryService.removeItem(item.itemname, 1);
      } else {
        this.itemDetailsLootResult = ['The container is empty.'];
        await this.inventoryService.removeItem(item.itemname, 1);
      }

      // Refresh inventory data to reflect the changes
      await this.loadInventoryData();
    }
  }

  async onContainerOpen() {
    if (!this.containerModalItem || this.containerModalOpened) return;
    const item = this.containerModalItem;
    this.containerModalOpened = true; // Prevent multiple opens
    await this.handleContainerLoot(item);
  }

  closeContainerModal() {
    this.containerModalOpen = false;
    this.containerModalItem = null;
    this.containerModalFoundItems = [];
    this.containerModalOpened = false; // Reset the opened flag
  }

  async onContainerUnlock() {
    if (!this.containerModalItem || this.containerModalOpened) return;
    const item = this.containerModalItem;
    this.containerModalOpened = true; // Prevent multiple opens

    // Check for specific keys based on container type
    let keyName = '';
    if (item.itemname === 'Locked Box') {
      keyName = 'Small Rusty Key';
    } else if (item.itemname === 'Chest') {
      keyName = 'Chest Key';
    } else {
      keyName = 'Key';
    }

    const result = await this.inventoryService.unlockWithKey(item, keyName);
    if (result.success) {
      this.containerModalFoundItems = result.items?.map(item => item.name) || [];
      await this.loadInventoryData();
    } else {
      this.containerModalFoundItems = [result.message];
    }
  }

  async onContainerLockpick() {
    if (!this.containerModalItem || this.containerModalOpened) return;
    const item = this.containerModalItem;
    this.containerModalOpened = true; // Prevent multiple opens

    const result = await this.inventoryService.lockpickContainer(item);
    if (result.success) {
      this.containerModalFoundItems = result.items?.map(item => item.name) || [];
      await this.loadInventoryData();
    } else {
      this.containerModalFoundItems = [result.message];
    }
  }

  ngOnInit() {
    console.log('InventoryPage ngOnInit called');
    this.loadUserSettings();
    this.loadInventoryData();
  }

  ionViewWillEnter() {
    console.log('InventoryPage ionViewWillEnter called');
    this.loadUserSettings();
    this.loadInventoryData();
  }

  private async loadUserSettings(): Promise<void> {
    const user = this.authService.getCurrentUser();
    if (user) {
      const settings = await this.settingsService.getUserSettings(user.uid) as any;
      if (settings) {
        document.documentElement.style.setProperty('--theme-color', settings.themeColor);
        document.documentElement.style.setProperty('--ion-color-primary', settings.themeColor);
        const textColor = this.getTextColorForTheme(settings.themeColor);
        document.documentElement.style.setProperty('--header-text-color', textColor);
      } else {
        // Use default theme color
        const defaultThemeColor = '#c9a682';
        document.documentElement.style.setProperty('--theme-color', defaultThemeColor);
        document.documentElement.style.setProperty('--ion-color-primary', defaultThemeColor);
        document.documentElement.style.setProperty('--header-text-color', '#181200');
      }
    }
  }

  private getTextColorForTheme(themeColor: string): string {
    const hex = themeColor.replace('#', '');
    const r = parseInt(hex.substr(0, 2), 16);
    const g = parseInt(hex.substr(2, 2), 16);
    const b = parseInt(hex.substr(4, 2), 16);
    const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;
    return luminance < 0.5 ? '#ffffff' : '#181200';
  }

  // Filter methods (based on old demo)
  setKeepFilter(filter: string) {
    this.keepFilter = filter;
    this.loadInventoryData();
  }

  setTradeFilter(filter: string) {
    this.tradeFilter = filter;
    this.loadInventoryData();
  }

  setFoodFilter(filter: string) {
    this.foodFilter = filter;
    this.loadInventoryData();
  }

  private async loadInventoryData() {
    try {
      // Load inventory from service
      await this.inventoryService.loadInventory();

      // Get all inventory items
      const allItems = this.inventoryService.inventory;

      // Filter items based on current filters
      this.keepPocketItems = this.filterKeepItems(allItems);
      this.tradePocketItems = this.filterTradeItems(allItems);
      this.foodPocketItems = this.filterFoodItems(allItems);

      console.log(`Loaded inventory: ${allItems.length} total items`);
      console.log(`Keep pocket: ${this.keepPocketItems.length} items`);
      console.log(`Trade pocket: ${this.tradePocketItems.length} items`);
      console.log(`Food pocket: ${this.foodPocketItems.length} items`);
    } catch (error) {
      console.error('Error loading inventory data:', error);
    }
  }

  private filterKeepItems(items: Inventory[]): Inventory[] {
    let filtered = items.filter(item => item.keep > 0 && item.itemtype !== 'Food');

    if (this.keepFilter !== 'All') {
      filtered = filtered.filter(item => item.itemtype === this.keepFilter);
    }

    return filtered.sort((a, b) => {
      // Sort by equipable, then itemtype, then level, then rarity
      if (a.equipable !== b.equipable) return b.equipable - a.equipable;
      if (a.itemtype !== b.itemtype) return a.itemtype.localeCompare(b.itemtype);
      if (a.itemlevel !== b.itemlevel) return b.itemlevel - a.itemlevel;
      return this.getRarityValue(b.itemrarity) - this.getRarityValue(a.itemrarity);
    });
  }

  private filterTradeItems(items: Inventory[]): Inventory[] {
    let filtered = items.filter(item => item.trade > 0 && item.itemtype !== 'Food');

    if (this.tradeFilter !== 'All') {
      filtered = filtered.filter(item => item.itemtype === this.tradeFilter);
    }

    return filtered.sort((a, b) => {
      // Sort by rarity, then level, then type
      if (this.getRarityValue(a.itemrarity) !== this.getRarityValue(b.itemrarity)) {
        return this.getRarityValue(a.itemrarity) - this.getRarityValue(b.itemrarity);
      }
      if (a.itemlevel !== b.itemlevel) return a.itemlevel - b.itemlevel;
      return a.itemtype.localeCompare(b.itemtype);
    });
  }

  private filterFoodItems(items: Inventory[]): Inventory[] {
    let filtered = items.filter(item => item.keep > 0 && item.itemtype === 'Food');

    if (this.foodFilter !== 'All') {
      filtered = filtered.filter(item => item.itemtype === this.foodFilter);
    }

    return filtered.sort((a, b) => {
      // Sort by type, then level, then rarity
      if (a.itemtype !== b.itemtype) return a.itemtype.localeCompare(b.itemtype);
      if (a.itemlevel !== b.itemlevel) return b.itemlevel - a.itemlevel;
      return this.getRarityValue(b.itemrarity) - this.getRarityValue(a.itemrarity);
    });
  }

  private getRarityValue(rarity: string): number {
    const rarityValues: { [key: string]: number } = {
      'Common': 1,
      'Uncommon': 2,
      'Rare': 3,
      'Epic': 4,
      'Legendary': 5
    };
    return rarityValues[rarity] || 0;
  }

  // Toggle methods for collapsible sections
  toggleKeepPocket() {
    this.isKeepPocketOpen = !this.isKeepPocketOpen;
  }

  toggleTradePocket() {
    this.isTradePocketOpen = !this.isTradePocketOpen;
  }

  toggleFoodPocket() {
    this.isFoodPocketOpen = !this.isFoodPocketOpen;
  }

  toggleEquippedItems() {
    this.isEquippedItemsOpen = !this.isEquippedItemsOpen;
  }

  // Helper methods for template (moved from complex template expressions)
  getEquippedItem(slot: string): Inventory | null {
    return this.inventoryService.inventory.find(i => i.equiplocation === slot && i.equip === 1) || null;
  }

  getEquippedItemImage(slot: string): string {
    const item = this.getEquippedItem(slot);
    return item ? `assets/items/${item.itemimage}.webp` : 'assets/items/empty.webp';
  }

  getEquippedItemName(slot: string): string {
    const item = this.getEquippedItem(slot);
    return item ? item.itemname : '';
  }

  getEquippedRings(): Inventory[] {
    return this.inventoryService.inventory.filter(i => i.equiplocation === 'Finger' && i.equip === 1);
  }

  getRingItem(index: number): Inventory | null {
    const rings = this.getEquippedRings();
    return rings[index] || null;
  }

  getRingImage(index: number): string {
    const ring = this.getRingItem(index);
    return ring ? `assets/items/${ring.itemimage}.webp` : 'assets/items/empty.webp';
  }

  getRingName(index: number): string {
    const ring = this.getRingItem(index);
    return ring ? ring.itemname : '';
  }

  getEquipmentSlots(): string[] {
    return ['Head', 'Neck', 'Shoulders', 'Back', 'Chest', 'Wrists', 'Ears', 'Forehead', 'Hands', 'Waist', 'Legs', 'Feet', 'Weapon', 'Offhand'];
  }

  getRingIndices(): number[] {
    return [0, 1, 2, 3];
  }

  hasEquippedItem(slot: string): boolean {
    return this.getEquippedItem(slot) !== null;
  }

  hasRingItem(index: number): boolean {
    return this.getRingItem(index) !== null;
  }

  getItemImage(item: Inventory): string {
    return `assets/items/${item.itemimage}.webp`;
  }

  getItemAmount(item: Inventory): number {
    if (item.keep > 0) return item.keep;
    if (item.trade > 0) return item.trade;
    return 1;
  }

  showAmount(item: Inventory): boolean {
    return this.getItemAmount(item) > 1;
  }

  showValue(item: Inventory): boolean {
    return item.itemvalue > 0;
  }

  openItemModal(item: Inventory) {
    this.selectedItem = item;
  }

  openEquippedItemModal(slot: string) {
    const item = this.getEquippedItem(slot);
    if (item) {
      this.selectedItem = item;
    }
  }

  openRingItemModal(ringIndex: number) {
    const ring = this.getRingItem(ringIndex);
    if (ring) {
      this.selectedItem = ring;
    }
  }

  closeItemModal() {
    this.selectedItem = null;
    this.itemDetailsLootResult = []; // Reset loot result
  }

  async onEquip() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;

    // Determine which pocket the item is from
    const isFromTrade = item.trade > 0;
    const isFromKeep = item.keep > 0;

    // Special case for rings (Finger): allow up to 4
    if (item.equiplocation === 'Finger') {
      const equippedRings = this.inventoryService.inventory.filter(
        i => i.equiplocation === 'Finger' && i.equip === 1
      );
      if (equippedRings.length >= 4) {
        alert('You already have 4 rings equipped. Unequip one before equipping another.');
        return;
      }

      // If from keep pocket and only 1 item, remove from keep
      if (isFromKeep && item.keep === 1) {
        await this.inventoryService.updateItem({
          ...item,
          equip: 1,
          keep: 0,
          trade: item.trade,
          equiplh: 0,
          equiprh: 0
        });
      } else if (isFromTrade && item.trade === 1) {
        // If from trade pocket and only 1 item, remove from trade
        await this.inventoryService.updateItem({
          ...item,
          equip: 1,
          keep: item.keep,
          trade: 0,
          equiplh: 0,
          equiprh: 0
        });
      } else {
        // Subtract 1 from the source pocket
        await this.inventoryService.updateItem({
          ...item,
          equip: 1,
          keep: isFromKeep ? item.keep - 1 : item.keep,
          trade: isFromTrade ? item.trade - 1 : item.trade,
          equiplh: 0,
          equiprh: 0
        });
      }
      await this.loadInventoryData();
      this.closeItemModal();
      return;
    }

    // Unequip any item in the same slot (not Finger)
    const equippedInSlot = this.inventoryService.inventory.filter(
      i => i.equiplocation === item.equiplocation && i.equip === 1 && i.id !== item.id
    );
    for (const equippedItem of equippedInSlot) {
      await this.inventoryService.updateItem({
        ...equippedItem,
        equip: 0,
        equiplh: 0,
        equiprh: 0,
        keep: equippedItem.keep + 1,
        trade: equippedItem.trade
      });
    }

    // Equip the selected item
    if (isFromKeep && item.keep === 1) {
      // If from keep pocket and only 1 item, remove from keep
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        keep: 0,
        trade: item.trade,
        equiplh: 0,
        equiprh: 0
      });
    } else if (isFromTrade && item.trade === 1) {
      // If from trade pocket and only 1 item, remove from trade
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        keep: item.keep,
        trade: 0,
        equiplh: 0,
        equiprh: 0
      });
    } else {
      // Subtract 1 from the source pocket
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        keep: isFromKeep ? item.keep - 1 : item.keep,
        trade: isFromTrade ? item.trade - 1 : item.trade,
        equiplh: 0,
        equiprh: 0
      });
    }
    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onEquipLeft() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;

    // Determine which pocket the item is from
    const isFromTrade = item.trade > 0;
    const isFromKeep = item.keep > 0;

    // Unequip any left-hand equipped item
    const equippedLeft = this.inventoryService.inventory.filter(
      i => i.equiplh === 1 && i.equip === 1 && i.id !== item.id
    );
    for (const equippedItem of equippedLeft) {
      await this.inventoryService.updateItem({
        ...equippedItem,
        equip: 0,
        equiplh: 0,
        equiprh: 0,
        keep: equippedItem.keep + 1,
        trade: equippedItem.trade
      });
    }

    // Equip the selected item
    if (isFromKeep && item.keep === 1) {
      // If from keep pocket and only 1 item, remove from keep
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplh: 1,
        equiprh: 0,
        keep: 0,
        trade: item.trade
      });
    } else if (isFromTrade && item.trade === 1) {
      // If from trade pocket and only 1 item, remove from trade
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplh: 1,
        equiprh: 0,
        keep: item.keep,
        trade: 0
      });
    } else {
      // Subtract 1 from the source pocket
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplh: 1,
        equiprh: 0,
        keep: isFromKeep ? item.keep - 1 : item.keep,
        trade: isFromTrade ? item.trade - 1 : item.trade
      });
    }
    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onEquipRight() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;

    // Determine which pocket the item is from
    const isFromTrade = item.trade > 0;
    const isFromKeep = item.keep > 0;

    // Unequip any right-hand equipped item
    const equippedRight = this.inventoryService.inventory.filter(
      i => i.equiprh === 1 && i.equip === 1 && i.id !== item.id
    );
    for (const equippedItem of equippedRight) {
      await this.inventoryService.updateItem({
        ...equippedItem,
        equip: 0,
        equiplh: 0,
        equiprh: 0,
        keep: equippedItem.keep + 1,
        trade: equippedItem.trade
      });
    }

    // Equip the selected item
    if (isFromKeep && item.keep === 1) {
      // If from keep pocket and only 1 item, remove from keep
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplh: 0,
        equiprh: 1,
        keep: 0,
        trade: item.trade
      });
    } else if (isFromTrade && item.trade === 1) {
      // If from trade pocket and only 1 item, remove from trade
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplh: 0,
        equiprh: 1,
        keep: item.keep,
        trade: 0
      });
    } else {
      // Subtract 1 from the source pocket
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplh: 0,
        equiprh: 1,
        keep: isFromKeep ? item.keep - 1 : item.keep,
        trade: isFromTrade ? item.trade - 1 : item.trade
      });
    }
    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onTrade() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;

    // Only trade items from keep pocket
    if (item.keep <= 0) {
      alert('Can only trade items from keep pocket.');
      return;
    }

    // Move item from keep to trade pocket (following old PHP demo logic)
    if (item.keep === 1) {
      // If only 1 item in keep, remove from keep and add to trade
      await this.inventoryService.updateItem({
        ...item,
        equip: 0,
        equiplh: 0,
        equiprh: 0,
        keep: 0,
        trade: item.trade + 1
      });
    } else {
      // Subtract 1 from keep and add 1 to trade
      await this.inventoryService.updateItem({
        ...item,
        equip: 0,
        equiplh: 0,
        equiprh: 0,
        keep: item.keep - 1,
        trade: item.trade + 1
      });
    }

    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onUse() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;
    if (item.keep > 1) {
      await this.inventoryService.updateItem({
        ...item,
        keep: item.keep - 1
      });
    } else {
      await this.inventoryService.removeItem(item.itemname, 1);
    }
    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onUnequip() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;

    // Unequip the item (following old PHP demo logic)
    await this.inventoryService.updateItem({
      ...item,
      equip: 0,
      equiplh: 0,
      equiprh: 0,
      keep: item.keep + 1,
      trade: item.trade
    });

    await this.loadInventoryData();
    this.closeItemModal();
  }

  onRead() {
    // Placeholder: show a toast or modal
    alert('Read action not implemented.');
    this.closeItemModal();
  }
  onUnlock() {
    if (!this.selectedItem) return;

    const item = this.selectedItem;

    // Check if this is a locked container
    if (item.keylock > 0) {
      this.handleLockedContainer(item);
    } else {
      alert('This item cannot be unlocked.');
    }

    this.closeItemModal();
  }

  /**
   * Handle unlocking a locked container
   */
  private async handleLockedContainer(item: Inventory) {
    // Check for specific keys based on container type
    let hasKey = false;
    let keyName = '';

    if (item.itemname === 'Locked Box') {
      keyName = 'Small Rusty Key';
      hasKey = this.inventoryService.hasKey(keyName);
    } else if (item.itemname === 'Chest') {
      // Chest can be lockpicked or might have a specific key
      hasKey = this.inventoryService.hasKey('Chest Key') || this.inventoryService.hasKey('Key');
      keyName = 'Chest Key';
    } else {
      // Generic locked container
      hasKey = this.inventoryService.hasKey('Key') || this.inventoryService.hasKey('Generic Key');
      keyName = 'Key';
    }

    const hasLockpick = this.inventoryService.hasLockpick();

    if (hasKey) {
      // Try to unlock with key
      const result = await this.inventoryService.unlockWithKey(item, keyName);
      if (result.success) {
        // Show success message and items found
        this.itemDetailsLootResult = result.items?.map(item => item.name) || [];
        await this.loadInventoryData();

        // Show result modal
        const modal = await this.modalCtrl.create({
          component: ResultModalComponent,
          componentProps: {
            title: 'Container Unlocked',
            message: result.message,
            items: result.items?.map(item => item.name) || [],
            experience: 5 // Based on old demo
          }
        });
        await modal.present();
      } else {
        // Show error message
        const modal = await this.modalCtrl.create({
          component: ResultModalComponent,
          componentProps: {
            title: 'Cannot Unlock',
            message: result.message,
            items: [],
            experience: 0
          }
        });
        await modal.present();
      }
    } else if (hasLockpick) {
      // Try to lockpick
      const result = await this.inventoryService.lockpickContainer(item);
      if (result.success) {
        // Show success message and items found
        this.itemDetailsLootResult = result.items?.map(item => item.name) || [];
        await this.loadInventoryData();

        // Show result modal
        const modal = await this.modalCtrl.create({
          component: ResultModalComponent,
          componentProps: {
            title: 'Lockpick Successful',
            message: result.message,
            items: result.items?.map(item => item.name) || [],
            experience: 5 // Based on old demo
          }
        });
        await modal.present();
      } else {
        // Show failure message
        const modal = await this.modalCtrl.create({
          component: ResultModalComponent,
          componentProps: {
            title: 'Lockpick Failed',
            message: result.message,
            items: [],
            experience: 0
          }
        });
        await modal.present();
      }
    } else {
      // No key or lockpick available
      const modal = await this.modalCtrl.create({
        component: ResultModalComponent,
        componentProps: {
          title: 'Cannot Unlock',
          message: 'You need a key or lockpick to unlock this container.',
          items: [],
          experience: 0
        }
      });
      await modal.present();
    }
  }
  onOpen() {
    alert('Open action not implemented.');
    this.closeItemModal();
  }

  goBack() {
    this.router.navigate(['/game']);
  }

  openEquipModal(slot: string) {
    this.equipModalSlot = slot;
    // Filter keep pocket items for those that can be equipped in this slot
    this.equipModalItems = this.keepPocketItems.filter(item =>
      item.equipable === 1 && item.equiplocation === slot
    );
    this.equipModalOpen = true;
  }

  closeEquipModal() {
    this.equipModalOpen = false;
    this.equipModalSlot = null;
    this.equipModalItems = [];
  }

  async onEquipItemSelected(item: Inventory) {
    if (!item || !this.equipModalSlot) return;
    const slot = this.equipModalSlot;
    const isRing = slot === 'Finger';
    const isFromKeep = item.keep > 0;
    const isFromTrade = item.trade > 0;

    // For rings, allow up to 4
    if (isRing) {
      const equippedRings = this.inventoryService.inventory.filter(
        i => i.equiplocation === 'Finger' && i.equip === 1
      );
      if (equippedRings.length >= 4) {
        this.closeEquipModal();
        return;
      }
    } else {
      // Unequip any item in the same slot (not Finger)
      const equippedInSlot = this.inventoryService.inventory.filter(
        i => i.equiplocation === slot && i.equip === 1 && i.id !== item.id
      );
      for (const equippedItem of equippedInSlot) {
        await this.inventoryService.updateItem({
          ...equippedItem,
          equip: 0,
          equiplh: 0,
          equiprh: 0,
          keep: equippedItem.keep + 1,
          trade: equippedItem.trade
        });
      }
    }

    // Equip the selected item
    if (isFromKeep && item.keep === 1) {
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplocation: slot,
        keep: 0,
        trade: item.trade,
        equiplh: 0,
        equiprh: 0
      });
    } else if (isFromTrade && item.trade === 1) {
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplocation: slot,
        keep: item.keep,
        trade: 0,
        equiplh: 0,
        equiprh: 0
      });
    } else {
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        equiplocation: slot,
        keep: isFromKeep ? item.keep - 1 : item.keep,
        trade: isFromTrade ? item.trade - 1 : item.trade,
        equiplh: 0,
        equiprh: 0
      });
    }
    await this.loadInventoryData();
    this.closeEquipModal();
  }
}
