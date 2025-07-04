import { Component, Input, Output, EventEmitter } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule, ModalController } from '@ionic/angular';
import { addIcons } from 'ionicons';
import { closeOutline, alertCircleOutline } from 'ionicons/icons';

export interface FoundItem {
  image: string;
  name: string;
  description?: string;
  quantity?: number;
}

@Component({
  selector: 'app-item-found-modal',
  template: `
    <ion-header>
      <ion-toolbar color="primary">
        <ion-title>Item Found</ion-title>
        <ion-buttons slot="end">
          <ion-button (click)="close()">
            <ion-icon name="close-outline"></ion-icon>
          </ion-button>
        </ion-buttons>
      </ion-toolbar>
    </ion-header>
    <ion-content class="ion-padding">
      <div *ngIf="eventMessage" class="event-message">
        <ion-icon name="alert-circle-outline" color="warning"></ion-icon>
        <span>{{ eventMessage }}</span>
      </div>
      <div *ngIf="items && items.length > 0">
        <div class="item-list">
          <div *ngFor="let item of items" class="item-row">
            <img [src]="getItemImage(item)" [alt]="item.name" class="item-image" />
            <div class="item-info">
              <div class="item-name">{{ item.name }}<span *ngIf="item.quantity"> x{{ item.quantity }}</span></div>
              <div class="item-desc" *ngIf="item.description">{{ item.description }}</div>
            </div>
          </div>
        </div>
      </div>
      <ion-button expand="block" (click)="close()">OK</ion-button>
    </ion-content>
  `,
  styles: [`
    .item-list {
      margin-top: 1em;
      margin-bottom: 1em;
    }
    .item-row {
      display: flex;
      align-items: center;
      margin-bottom: 1em;
      background: var(--ion-color-light, #f4f4f4);
      border-radius: 8px;
      padding: 0.5em;
      box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    }
    .item-image {
      width: 48px;
      height: 48px;
      object-fit: contain;
      margin-right: 1em;
      border-radius: 4px;
      background: #fff;
      border: 1px solid #ddd;
    }
    .item-info {
      flex: 1;
    }
    .item-name {
      font-weight: bold;
      font-size: 1.1em;
    }
    .item-desc {
      font-size: 0.95em;
      color: #666;
    }
    .event-message {
      display: flex;
      align-items: center;
      background: #fffbe6;
      color: #b8860b;
      border: 1px solid #ffe58f;
      border-radius: 6px;
      padding: 0.75em 1em;
      margin-bottom: 1em;
      font-size: 1.05em;
    }
    .event-message ion-icon {
      margin-right: 0.5em;
      font-size: 1.3em;
    }
  `],
  standalone: true,
  imports: [CommonModule, IonicModule]
})
export class ItemFoundModalComponent {
  @Input() items: FoundItem[] = [];
  @Input() eventMessage?: string;
  @Output() closed = new EventEmitter<void>();

  constructor(private modalCtrl: ModalController) {
    addIcons({ closeOutline, alertCircleOutline });
  }

  close() {
    this.modalCtrl.dismiss();
    this.closed.emit();
  }

  getItemImage(item: FoundItem): string {
    // Use assets path for item images with webp extension
    // Match the old demo filename pattern (lowercase, no spaces)
    const imageName = item.image.toLowerCase().replace(/\s+/g, '');
    return item.image.startsWith('assets/') ? item.image : `assets/items/${imageName}.webp`;
  }

  // Static helper to present the modal
  static async present(modalCtrl: ModalController, items: FoundItem[], eventMessage?: string) {
    const modal = await modalCtrl.create({
      component: ItemFoundModalComponent,
      componentProps: { items, eventMessage },
      cssClass: 'item-found-modal',
      backdropDismiss: false,
      keyboardClose: true
    });
    await modal.present();
    return modal;
  }
}
