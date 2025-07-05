import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule, ModalController } from '@ionic/angular';
import { Router } from '@angular/router';
import { AuthService } from '../../../services/auth.service';
import { CharacterService } from '../../../game/services/character.service';
import { InventoryService } from '../../../game/services/inventory.service';
import { addIcons } from 'ionicons';
import { informationCircleOutline } from 'ionicons/icons';
import { ItemInfoModalComponent, DetailedItem } from '../../components/item-info-modal/item-info-modal.component';

interface InventoryItem {
  id: string;
  name: string;
  image: string;
  description: string;
  type: 'Weapon' | 'Armor' | 'Accessory' | 'Food' | 'Other';
  rarity: string;
  level: number;
  quantity: number;
  location: 'keep' | 'trade' | 'equipped' | 'food';
  equipLocation?: string;
  value: number;
  effects?: string[];
}

@Component({
  selector: 'app-inventory',
  templateUrl: './inventory.page.html',
  styleUrls: ['./inventory.page.scss'],
  standalone: true,
  imports: [CommonModule, IonicModule]
})
export class InventoryPage implements OnInit {
  private router = inject(Router);
  private authService = inject(AuthService);
  private characterService = inject(CharacterService);
  private inventoryService = inject(InventoryService);
  private modalCtrl = inject(ModalController);

  constructor() {
    addIcons({ informationCircleOutline });
  }

  // Collapsible states
  keepPocketOpen = true;
  tradePocketOpen = false;
  foodPocketOpen = false;
  equipPocketOpen = false;

  // Filter states
  keepFilter: 'All' | 'Weapon' | 'Armor' | 'Accessory' | 'Other' = 'All';
  tradeFilter: 'All' | 'Weapon' | 'Armor' | 'Accessory' | 'Other' = 'All';
  foodFilter: 'All' | 'Ingredient' | 'Recipes' | 'Tools' | 'Other' = 'All';

  // Sample inventory data (placeholder)
  keepItems: InventoryItem[] = [
    {
      id: '1',
      name: 'Iron Sword',
      image: 'sword',
      description: 'A sturdy iron sword with good balance.',
      type: 'Weapon',
      rarity: 'Common',
      level: 5,
      quantity: 1,
      location: 'keep',
      value: 50,
      effects: ['Attack: +15']
    },
    {
      id: '2',
      name: 'Leather Armor',
      image: 'armor',
      description: 'Light leather armor offering basic protection.',
      type: 'Armor',
      rarity: 'Common',
      level: 3,
      quantity: 1,
      location: 'keep',
      value: 30,
      effects: ['Defense: +10']
    },
    {
      id: '3',
      name: 'Health Ring',
      image: 'ring',
      description: 'A magical ring that enhances vitality.',
      type: 'Accessory',
      rarity: 'Rare',
      level: 8,
      quantity: 1,
      location: 'keep',
      value: 100,
      effects: ['Health: +20', 'Regeneration: +2']
    }
  ];

  tradeItems: InventoryItem[] = [
    {
      id: '4',
      name: 'Steel Dagger',
      image: 'dagger',
      description: 'A sharp steel dagger for close combat.',
      type: 'Weapon',
      rarity: 'Uncommon',
      level: 7,
      quantity: 1,
      location: 'trade',
      value: 75,
      effects: ['Attack: +12', 'Speed: +5']
    },
    {
      id: '5',
      name: 'Magic Staff',
      image: 'staff',
      description: 'A staff imbued with magical energy.',
      type: 'Weapon',
      rarity: 'Rare',
      level: 10,
      quantity: 1,
      location: 'trade',
      value: 150,
      effects: ['Magic: +25', 'Mana: +30']
    }
  ];

  foodItems: InventoryItem[] = [
    {
      id: '6',
      name: 'Bread',
      image: 'bread',
      description: 'Fresh baked bread.',
      type: 'Food',
      rarity: 'Common',
      level: 1,
      quantity: 5,
      location: 'food',
      value: 2,
      effects: ['Health: +5']
    },
    {
      id: '7',
      name: 'Apple',
      image: 'apple',
      description: 'A crisp red apple.',
      type: 'Food',
      rarity: 'Common',
      level: 1,
      quantity: 3,
      location: 'food',
      value: 1,
      effects: ['Health: +3', 'Mana: +2']
    }
  ];

  equippedItems: InventoryItem[] = [
    {
      id: '8',
      name: 'Steel Sword',
      image: 'steelsword',
      description: 'A well-crafted steel sword.',
      type: 'Weapon',
      rarity: 'Uncommon',
      level: 6,
      quantity: 1,
      location: 'equipped',
      equipLocation: 'Right Hand',
      value: 80,
      effects: ['Attack: +18']
    }
  ];

  ngOnInit() {
    // Check authentication
    if (!this.authService.isLoggedIn()) {
      this.router.navigate(['/login']);
      return;
    }

    // Load actual inventory data here
    this.loadInventoryData();
  }

  private loadInventoryData() {
    // TODO: Load actual inventory data from services
    console.log('Loading inventory data...');
  }

  // Collapsible toggle methods
  toggleKeepPocket() {
    this.keepPocketOpen = !this.keepPocketOpen;
  }

  toggleTradePocket() {
    this.tradePocketOpen = !this.tradePocketOpen;
  }

  toggleFoodPocket() {
    this.foodPocketOpen = !this.foodPocketOpen;
  }

  toggleEquipPocket() {
    this.equipPocketOpen = !this.equipPocketOpen;
  }

  // Filter methods
  setKeepFilter(filter: 'All' | 'Weapon' | 'Armor' | 'Accessory' | 'Other') {
    this.keepFilter = filter;
  }

  setTradeFilter(filter: 'All' | 'Weapon' | 'Armor' | 'Accessory' | 'Other') {
    this.tradeFilter = filter;
  }

  setFoodFilter(filter: 'All' | 'Ingredient' | 'Recipes' | 'Tools' | 'Other') {
    this.foodFilter = filter;
  }

  // Get filtered items
  getFilteredKeepItems(): InventoryItem[] {
    if (this.keepFilter === 'All') {
      return this.keepItems;
    }
    return this.keepItems.filter(item => item.type === this.keepFilter);
  }

  getFilteredTradeItems(): InventoryItem[] {
    if (this.tradeFilter === 'All') {
      return this.tradeItems;
    }
    return this.tradeItems.filter(item => item.type === this.tradeFilter);
  }

  getFilteredFoodItems(): InventoryItem[] {
    if (this.foodFilter === 'All') {
      return this.foodItems;
    }
    // For now, return all food items since we don't have the specific food types
    return this.foodItems;
  }

  // Action methods (placeholder for now)
  moveToKeep(item: InventoryItem) {
    console.log('Moving item to keep:', item.name);
    // TODO: Implement move logic
  }

  moveToTrade(item: InventoryItem) {
    console.log('Moving item to trade:', item.name);
    // TODO: Implement move logic
  }

  equipItem(item: InventoryItem) {
    console.log('Equipping item:', item.name);
    // TODO: Implement equip logic
  }

  unequipItem(item: InventoryItem) {
    console.log('Unequipping item:', item.name);
    // TODO: Implement unequip logic
  }

  consumeItem(item: InventoryItem) {
    console.log('Consuming item:', item.name);
    // TODO: Implement consume logic
  }

  // Navigation
  goBack() {
    this.router.navigate(['/game']);
  }

  // Error handling for images
  onItemImageError(event: any, item: InventoryItem) {
    try {
      console.warn(`Failed to load image for ${item.name}`);
      if (event?.target) {
        event.target.style.display = 'none';
      }
    } catch (error) {
      console.warn('Error handling item image error:', error);
    }
  }

  // Show item info modal
  async showItemInfo(item: InventoryItem) {
    try {
      // Convert InventoryItem to DetailedItem
      const detailedItem: DetailedItem = {
        ...item,
        // Add some sample detailed properties based on item type
        damage: item.type === 'Weapon' ? item.level * 3 : undefined,
        defense: item.type === 'Armor' ? item.level * 2 : undefined,
        speed: item.type === 'Weapon' ? item.level : undefined,
        range: item.type === 'Weapon' ? 1 : undefined,
        durability: 100,
        weight: item.level,
        enchantable: item.rarity === 'Rare' || item.rarity === 'Epic' || item.rarity === 'Legendary',
        transmutable: item.rarity === 'Epic' || item.rarity === 'Legendary',
        adjustable: item.rarity === 'Legendary',
        legendary: item.rarity === 'Legendary',
        readable: item.type === 'Other' && item.name.toLowerCase().includes('book'),
        keylock: item.type === 'Other' && item.name.toLowerCase().includes('key'),
        container: item.type === 'Other' && item.name.toLowerCase().includes('bag'),
        duality: item.type === 'Weapon' && item.name.toLowerCase().includes('dagger')
      };

      await ItemInfoModalComponent.present(this.modalCtrl, detailedItem);
    } catch (error) {
      console.error('Error showing item info:', error);
    }
  }
}
