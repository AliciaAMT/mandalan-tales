import { Component, Input, Output, EventEmitter } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Inventory } from '../../models/inventory.model';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'app-item-details-modal',
  standalone: true,
  imports: [CommonModule, IonicModule],
  template: `
    <div class="custom-modal-backdrop" (click)="closeModal()"></div>
    <div class="custom-modal">
      <div class="custom-modal-header">
        <h2>{{ item.itemname }}</h2>
        <button class="close-btn" (click)="closeModal()">&times;</button>
      </div>
      <div class="custom-modal-content">
        <img [src]="getItemImage()" [alt]="item.itemname" style="max-width: 120px; display: block; margin: 0 auto 1rem auto;" />
        <p><b>Level:</b> {{ item.itemlevel }} | <b>Rarity:</b> {{ item.itemrarity }}</p>
        <p *ngIf="item.keep > 1"><b>Amount:</b> {{ item.keep }}</p>
        <p><b>Description:</b> {{ item.itemdescription }}</p>
        <p *ngIf="item.itemvalue > 0"><b>Value:</b> {{ item.itemvalue }} Gold</p>
        <div *ngIf="item.itemtype === 'Weapon'">
          <p><b>Weapon Type:</b> {{ item.weapontype }}</p>
          <p><b>Range:</b> {{ item.itemrange }}</p>
          <p><b>Speed:</b> {{ item.itemspeed }}</p>
          <p><b>Dualwield:</b> {{ item.duality > 0 ? 'Yes' : 'No' }}</p>
          <p><b>Damage:</b> {{ item.weaponbase + item.itemlevel }}</p>
          <p *ngIf="item.criticalhit > 0"><b>Critical Hit:</b> +{{ item.criticalhit }}</p>
          <p *ngIf="item.sharpened > 0"><b>Sharpened:</b> +{{ item.sharpened }}</p>
        </div>
        <div *ngIf="item.itemtype === 'Armor'">
          <p><b>Armor Type:</b> {{ item.equiplocation }}</p>
          <p><b>Armor Rating:</b> {{ item.armorbase + item.itemlevel }}</p>
        </div>
        <div *ngIf="item.itemtype === 'Other'">
          <p><b>Item Type:</b> {{ item.othertype }}</p>
          <p *ngIf="item.armorbase + item.itemlevel > 0"><b>Armor Rating:</b> {{ item.armorbase + item.itemlevel }}</p>
        </div>
        <div *ngIf="item.lightsource > 0"><b>Lightsource</b></div>
        <div *ngIf="item.enhancement1 !== 'None'"><b>Enhancements:</b> {{ item.enhancement1 }}</div>
        <div *ngIf="item.enhancement2 !== 'None'"><b>{{ item.enhancement2 }}</b></div>
        <div *ngIf="item.enhancement3 !== 'None'"><b>{{ item.enhancement3 }}</b></div>
        <div *ngIf="item.legendary === 1"><b>Legendary</b></div>

        <!-- Loot Result Display -->
        <div *ngIf="lootResult.length > 0" class="loot-result">
          <h3>Container Contents:</h3>
          <ul>
            <li *ngFor="let result of lootResult">{{ result }}</li>
          </ul>
        </div>

        <div class="custom-modal-actions">
          <button *ngIf="item.readable > 0" (click)="onRead()">Read</button>
          <button *ngIf="item.keylock > 0" (click)="onUnlock()">Unlock</button>
          <button *ngIf="item.keylock === 0 && item.othertype === 'Container' && item.itemname !== 'Tinderbox' && lootResult.length === 0" (click)="onOpen()">Open</button>

          <!-- Actions for equipped items -->
          <ng-container *ngIf="item.equip === 1">
            <button (click)="onUnequip()">Unequip</button>
            <button (click)="onTrade()">Trade</button>
          </ng-container>

          <!-- Actions for unequipped items -->
          <ng-container *ngIf="item.equip === 0">
            <ng-container *ngIf="item.duality > 0">
              <button (click)="onEquipLeft()">Equip Left</button>
              <button (click)="onEquipRight()">Equip Right</button>
              <button (click)="onTrade()">Trade</button>
            </ng-container>
            <ng-container *ngIf="item.duality === 0 && item.equipable === 1">
              <button (click)="onEquip()">Equip</button>
              <button (click)="onTrade()">Trade</button>
            </ng-container>
          </ng-container>

          <button *ngIf="item.consumable === 1" (click)="onUse()">Use</button>
        </div>
      </div>
    </div>
  `,
  styleUrls: ['./item-details-modal.component.scss']
})
export class ItemDetailsModalComponent {
  @Input() item!: Inventory;
  @Input() lootResult: string[] = [];
  @Output() close = new EventEmitter<void>();
  @Output() equip = new EventEmitter<void>();
  @Output() equipLeft = new EventEmitter<void>();
  @Output() equipRight = new EventEmitter<void>();
  @Output() trade = new EventEmitter<void>();
  @Output() use = new EventEmitter<void>();
  @Output() read = new EventEmitter<void>();
  @Output() unlock = new EventEmitter<void>();
  @Output() open = new EventEmitter<void>();
  @Output() openContainer = new EventEmitter<Inventory>();
  @Output() unequip = new EventEmitter<void>();

  getItemImage(): string {
    return `assets/items/${this.item.itemimage}.webp`;
  }

  closeModal() { this.close.emit(); }
  onEquip() { this.equip.emit(); }
  onEquipLeft() { this.equipLeft.emit(); }
  onEquipRight() { this.equipRight.emit(); }
  onTrade() { this.trade.emit(); }
  onUse() { this.use.emit(); }
  onRead() { this.read.emit(); }
  onUnlock() { this.unlock.emit(); }
  onOpen() {
    if (this.item.othertype === 'Container') {
      this.openContainer.emit(this.item);
    } else {
      this.open.emit();
    }
  }
  onUnequip() { this.unequip.emit(); }
}
