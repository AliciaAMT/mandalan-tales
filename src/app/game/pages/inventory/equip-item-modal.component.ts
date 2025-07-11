import { Component, Input, Output, EventEmitter } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Inventory } from '../../../game/models/inventory.model';
import { FocusTrapDirective } from '../../../shared/focus-trap.directive';

@Component({
  selector: 'app-equip-item-modal',
  standalone: true,
  imports: [CommonModule, FocusTrapDirective],
  template: `
    <div class="custom-modal-backdrop" (click)="closeModal()"></div>
    <div class="custom-modal" appFocusTrap tabindex="-1">
      <div class="custom-modal-header">
        <h2>Equip Item to {{ slot }}</h2>
        <button class="close-btn" (click)="closeModal()" aria-label="Close">&times;</button>
      </div>
      <div class="custom-modal-content">
        <div *ngIf="items.length === 0" class="empty-message">
          No equippable items available for this slot.
        </div>
        <div class="inventory-items-grid" *ngIf="items.length > 0">
          <div class="inventory-item-card" *ngFor="let item of items" (click)="selectItem(item)" tabindex="0" (keydown)="onItemKeydown($event, item)">
            <img [src]="getItemImage(item)" [alt]="item.itemname" class="inventory-item-image" />
            <div class="inventory-item-name">{{ item.itemname }}</div>
            <div class="inventory-item-details">
              <div>Level {{ item.itemlevel }} | {{ item.itemrarity }}</div>
              <div *ngIf="item.keep > 1">Amount: {{ item.keep }}</div>
              <div *ngIf="item.itemvalue > 0">Value: {{ item.itemvalue }} Gold</div>
            </div>
          </div>
        </div>
        <div class="custom-modal-actions">
          <button (click)="closeModal()" aria-label="Cancel">Cancel</button>
        </div>
      </div>
    </div>
  `,
  styles: [
    `.custom-modal-backdrop {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }
    .custom-modal {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #141414;
      border: 2px solid #333;
      border-radius: 8px;
      padding: 20px;
      z-index: 1001;
      min-width: 320px;
      max-width: 600px;
    }
    .custom-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      border-bottom: 1px solid #333;
      padding-bottom: 10px;
    }
    .custom-modal-header h2 {
      margin: 0;
      color: #fff;
    }
    .close-btn {
      background: none;
      border: none;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
      padding: 0;
      width: 30px;
      height: 30px;
    }
    .custom-modal-content {
      color: #fff;
    }
    .inventory-items-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin: 16px 0;
      justify-content: center;
    }
    .inventory-item-card {
      cursor: pointer;
      background: #111;
      color: #fff;
      border: 1px solid #333;
      border-radius: 8px;
      padding: 12px;
      width: 120px;
      text-align: center;
      transition: background 0.2s, box-shadow 0.2s;
    }
    .inventory-item-card:hover, .inventory-item-card:focus {
      background: rgba(200, 180, 120, 0.12);
      box-shadow: 0 0 0 2px var(--theme-color, #c9a682);
      outline: none;
    }
    .inventory-item-image {
      width: 64px;
      height: 64px;
      object-fit: contain;
      margin-bottom: 8px;
    }
    .inventory-item-name {
      font-weight: bold;
      margin-bottom: 4px;
    }
    .inventory-item-details {
      font-size: 0.9em;
      color: #ccc;
    }
    .empty-message {
      text-align: center;
      color: #bbb;
      margin: 24px 0;
    }
    .custom-modal-actions {
      margin-top: 20px;
      text-align: center;
    }
    .custom-modal-actions button {
      background: #333;
      color: #fff;
      border: 1px solid #555;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      margin: 5px;
    }
    .custom-modal-actions button:hover {
      background: #555;
    }
  `]
})
export class EquipItemModalComponent {
  @Input() slot: string = '';
  @Input() items: Inventory[] = [];
  @Output() itemSelected = new EventEmitter<Inventory>();
  @Output() close = new EventEmitter<void>();

  getItemImage(item: Inventory): string {
    return `assets/items/${item.itemimage}.webp`;
  }

  selectItem(item: Inventory) {
    this.itemSelected.emit(item);
  }

  closeModal() {
    this.close.emit();
  }

  onItemKeydown(event: KeyboardEvent, item: Inventory) {
    if (event.key === 'Enter' || event.key === ' ') {
      event.preventDefault();
      this.selectItem(item);
    }
  }
}
