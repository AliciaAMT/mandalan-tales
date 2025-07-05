import { Component, Input, OnInit, OnDestroy, HostListener } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule, ModalController } from '@ionic/angular';
import { addIcons } from 'ionicons';
import { closeOutline, informationCircleOutline } from 'ionicons/icons';

export interface DetailedItem {
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
  // Additional detailed properties
  damage?: number;
  defense?: number;
  speed?: number;
  range?: number;
  durability?: number;
  weight?: number;
  enchantable?: boolean;
  transmutable?: boolean;
  adjustable?: boolean;
  legendary?: boolean;
  readable?: boolean;
  keylock?: boolean;
  container?: boolean;
  duality?: boolean;
}

@Component({
  selector: 'app-item-info-modal',
  templateUrl: './item-info-modal.component.html',
  styleUrls: ['./item-info-modal.component.scss'],
  standalone: true,
  imports: [CommonModule, IonicModule]
})
export class ItemInfoModalComponent implements OnInit, OnDestroy {
  @Input() item!: DetailedItem;

  private lastFocusedElement: HTMLElement | null = null;

  constructor(private modalCtrl: ModalController) {
    addIcons({ closeOutline, informationCircleOutline });
  }

  ngOnInit() {
    // Save the currently focused element
    this.lastFocusedElement = document.activeElement as HTMLElement;
  }

  ngOnDestroy() {
    // Restore focus when component is destroyed
    if (this.lastFocusedElement) {
      setTimeout(() => {
        if (this.lastFocusedElement && document.contains(this.lastFocusedElement)) {
          this.lastFocusedElement.focus();
        }
      }, 100);
    }
  }

  close() {
    this.modalCtrl.dismiss();
  }

  @HostListener('document:keydown', ['$event'])
  handleKeydown(event: KeyboardEvent) {
    if (event.key === 'Escape') {
      event.preventDefault();
      this.close();
    }
  }

  getItemImage(): string {
    return `assets/items/${this.item.image}.png`;
  }

  getRarityClass(): string {
    return this.item.rarity.toLowerCase();
  }

  hasStats(): boolean {
    return !!(this.item.damage || this.item.defense || this.item.speed ||
              this.item.range || this.item.durability || this.item.weight);
  }

  hasProperties(): boolean {
    return !!(this.item.enchantable || this.item.transmutable || this.item.adjustable ||
              this.item.legendary || this.item.readable || this.item.keylock ||
              this.item.container || this.item.duality);
  }

  // Static helper to present the modal
  static async present(modalCtrl: ModalController, item: DetailedItem): Promise<void> {
    const modal = await modalCtrl.create({
      component: ItemInfoModalComponent,
      componentProps: { item },
      cssClass: 'item-info-modal',
      backdropDismiss: true,
      keyboardClose: true
    });
    await modal.present();
  }
}
