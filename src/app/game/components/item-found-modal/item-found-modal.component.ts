import { Component, Input, Output, EventEmitter, OnInit, OnDestroy, HostListener } from '@angular/core';
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
      <ion-toolbar>
        <ion-title>Game Event</ion-title>
        <ion-buttons slot="end">
          <ion-button (click)="close()" aria-label="Close dialog">
            <ion-icon name="close-outline"></ion-icon>
          </ion-button>
        </ion-buttons>
      </ion-toolbar>
    </ion-header>
    <ion-content class="ion-padding">
      <div *ngIf="eventMessage" class="event-message" role="alert" aria-live="polite">
        <ion-icon name="alert-circle-outline" color="warning" aria-hidden="true"></ion-icon>
        <span>{{ eventMessage }}</span>
      </div>
      <div *ngIf="items && items.length > 0" role="region" aria-label="Found items">
        <div class="item-list">
          <div *ngFor="let item of items" class="item-row">
            <img [src]="getItemImage(item)" [alt]="'Item image: ' + item.name" class="item-image" />
            <div class="item-info">
              <div class="item-name">{{ item.name }}<span *ngIf="item.quantity"> x{{ item.quantity }}</span></div>
              <div class="item-desc" *ngIf="item.description">{{ item.description }}</div>
            </div>
          </div>
        </div>
      </div>
      <div *ngIf="actions && actions.length > 0" class="modal-actions" role="group" aria-label="Available actions">
        <ion-button *ngFor="let action of actions" expand="block" (click)="selectAction(action.value)" [attr.aria-label]="action.label">{{ action.label }}</ion-button>
      </div>
      <ion-button *ngIf="!actions || actions.length === 0" expand="block" (click)="close()" aria-label="Close dialog">OK</ion-button>
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
      background: var(--ion-color-light, #f4f4f4);
      color: var(--ion-text-color, #000000);
      border: 1px solid var(--ion-color-medium, #92949c);
      border-radius: 6px;
      padding: 0.75em 1em;
      margin-bottom: 1em;
      font-size: 1.05em;
    }
    .event-message ion-icon {
      margin-right: 0.5em;
      font-size: 1.3em;
    }

    ion-button {
      --background: var(--ion-color-medium, #92949c);
      --color: var(--ion-color-medium-contrast, #ffffff);
      --border-color: var(--ion-color-medium, #92949c);
    }

    ion-button:hover {
      --background: var(--ion-color-medium-shade, #7a7d85);
    }
  `],
  standalone: true,
  imports: [CommonModule, IonicModule]
})
export class ItemFoundModalComponent implements OnInit, OnDestroy {
  @Input() items: FoundItem[] = [];
  @Input() eventMessage?: string;
  @Input() actions: { label: string, value: string }[] = [];
  @Output() closed = new EventEmitter<void>();

  private lastFocusedElement: HTMLElement | null = null;

  constructor(private modalCtrl: ModalController) {
    addIcons({ closeOutline, alertCircleOutline });
  }

  ngOnInit() {
    // Save the currently focused element
    this.lastFocusedElement = document.activeElement as HTMLElement;
  }

  ngOnDestroy() {
    // Restore focus when component is destroyed
    if (this.lastFocusedElement) {
      // Use a longer timeout to ensure the directive has finished its work
      setTimeout(() => {
        if (this.lastFocusedElement && document.contains(this.lastFocusedElement)) {
          this.lastFocusedElement.focus();
        }
      }, 100);
    }
  }

  close() {
    this.modalCtrl.dismiss();
    this.closed.emit();
  }

  selectAction(value: string) {
    this.modalCtrl.dismiss({ action: value });
    this.closed.emit();
  }

  @HostListener('document:keydown', ['$event'])
  handleKeydown(event: KeyboardEvent) {
    if (event.key === 'Escape') {
      event.preventDefault();
      this.close();
    }
  }

  getItemImage(item: FoundItem): string {
    // Use assets path for item images with webp extension
    // Match the old demo filename pattern (lowercase, no spaces)
    const imageName = item.image.toLowerCase().replace(/\s+/g, '');
    return item.image.startsWith('assets/') ? item.image : `assets/items/${imageName}.webp`;
  }

  // Static helper to present the modal
  static async present(modalCtrl: ModalController, items: FoundItem[], eventMessage?: string, actions?: { label: string, value: string }[]): Promise<string | undefined> {
    const modal = await modalCtrl.create({
      component: ItemFoundModalComponent,
      componentProps: { items, eventMessage, actions },
      cssClass: 'item-found-modal',
      backdropDismiss: false,
      keyboardClose: true
    });
    await modal.present();
    const result = await modal.onWillDismiss();
    return result.data?.action;
  }
}
