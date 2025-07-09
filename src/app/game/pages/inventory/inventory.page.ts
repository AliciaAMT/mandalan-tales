import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { Router, RouterModule } from '@angular/router';
import { FocusManagerDirective } from '../../../shared/focus-manager.directive';
import { addIcons } from 'ionicons';
import { addCircleOutline } from 'ionicons/icons';
import { AuthService } from '../../../services/auth.service';
import { SettingsService } from '../../services/settings.service';
import { InventoryService } from '../../services/inventory.service';
import { DEFAULT_THEME_COLOR } from '../../models/settings.model';
import { Inventory } from '../../models/inventory.model';
import { ItemDetailsModalComponent } from './item-details-modal.component';
import { ModalController } from '@ionic/angular';

@Component({
  selector: 'app-inventory',
  standalone: true,
  imports: [CommonModule, IonicModule, RouterModule, FocusManagerDirective, ItemDetailsModalComponent],
  templateUrl: './inventory.page.html',
  styleUrls: ['./inventory.page.scss']
})
export class InventoryPage implements OnInit {
  private router = inject(Router);
  private authService = inject(AuthService);
  private settingsService = inject(SettingsService);
  public inventoryService = inject(InventoryService);
  private modalCtrl = inject(ModalController);

  constructor() {
    // Register the icons we're using
    addIcons({ addCircleOutline });
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
      const settings = await this.settingsService.getUserSettings(user.uid);
      if (settings) {
        document.documentElement.style.setProperty('--theme-color', settings.themeColor);
        document.documentElement.style.setProperty('--ion-color-primary', settings.themeColor);
        const textColor = this.getTextColorForTheme(settings.themeColor);
        document.documentElement.style.setProperty('--header-text-color', textColor);
      } else {
        document.documentElement.style.setProperty('--theme-color', DEFAULT_THEME_COLOR);
        document.documentElement.style.setProperty('--ion-color-primary', DEFAULT_THEME_COLOR);
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
  }

  async onEquip() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;
    // Special case for rings (Finger): allow up to 4
    if (item.equiplocation === 'Finger') {
      const equippedRings = this.inventoryService.inventory.filter(
        i => i.equiplocation === 'Finger' && i.equip === 1
      );
      if (equippedRings.length >= 4) {
        alert('You already have 4 rings equipped. Unequip one before equipping another.');
        return;
      }
      await this.inventoryService.updateItem({
        ...item,
        equip: 1,
        keep: 0,
        equiplh: 0,
        equiprh: 0
      });
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
        keep: 1
      });
    }
    // Equip the selected item
    await this.inventoryService.updateItem({
      ...item,
      equip: 1,
      keep: 0,
      equiplh: 0,
      equiprh: 0
    });
    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onEquipLeft() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;
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
        keep: 1
      });
    }
    await this.inventoryService.updateItem({
      ...item,
      equip: 1,
      equiplh: 1,
      equiprh: 0,
      keep: 0
    });
    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onEquipRight() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;
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
        keep: 1
      });
    }
    await this.inventoryService.updateItem({
      ...item,
      equip: 1,
      equiplh: 0,
      equiprh: 1,
      keep: 0
    });
    await this.loadInventoryData();
    this.closeItemModal();
  }

  async onTrade() {
    if (!this.selectedItem) return;
    const item = this.selectedItem;

    // Move item from keep to trade pocket (following old PHP demo logic)
    await this.inventoryService.updateItem({
      ...item,
      equip: 0,
      equiplh: 0,
      equiprh: 0,
      keep: 0,
      trade: 1
    });

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
      keep: 1,
      trade: 0
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
    alert('Unlock action not implemented.');
    this.closeItemModal();
  }
  onOpen() {
    alert('Open action not implemented.');
    this.closeItemModal();
  }

  goBack() {
    this.router.navigate(['/game']);
  }
}
