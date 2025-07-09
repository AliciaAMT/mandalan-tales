import { Component, Input, Output, EventEmitter } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Inventory } from '../../models/inventory.model';
import { IonicModule } from '@ionic/angular';

@Component({
  selector: 'app-container-modal',
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
        <ng-container *ngIf="item.keylock > 0">
          <div *ngIf="hasKey; else lockpickBlock">
            <p>You have the correct key. Would you like to unlock?</p>
            <button (click)="onUnlock()">Unlock</button>
          </div>
          <ng-template #lockpickBlock>
            <div *ngIf="hasLockpick; else noWay">
              <p>You don't have the key, but you have a lockpick. Attempt to pick the lock?</p>
              <button (click)="onLockpick()">Attempt Lockpick</button>
            </div>
            <ng-template #noWay>
              <p>You need a key or a lockpick to open this container.</p>
            </ng-template>
          </ng-template>
        </ng-container>
        <ng-container *ngIf="item.keylock === 0 && item.othertype === 'Container'">
          <div *ngIf="foundItems.length === 0">
            <button (click)="closeModal()">Cancel</button>
            <button (click)="onOpen()" [disabled]="foundItems.length > 0">Open</button>
          </div>
          <div *ngIf="foundItems.length > 0">
            <p>You open the container and find:</p>
            <ul>
              <li *ngFor="let found of foundItems">{{ found }}</li>
            </ul>
            <button (click)="closeModal()">Close</button>
          </div>
        </ng-container>
      </div>
    </div>
  `,
  styles: [`
    .custom-modal-backdrop {
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
      min-width: 300px;
      max-width: 500px;
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

    .custom-modal-content button {
      background: #333;
      color: #fff;
      border: 1px solid #555;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      margin: 5px;
    }

    .custom-modal-content button:hover {
      background: #555;
    }

    .custom-modal-content button:disabled {
      background: #222;
      color: #666;
      cursor: not-allowed;
    }

    .custom-modal-content button:disabled:hover {
      background: #222;
    }

    .custom-modal-content ul {
      margin: 10px 0;
      padding-left: 20px;
    }

    .custom-modal-content li {
      margin: 5px 0;
    }
  `]
})
export class ContainerModalComponent {
  @Input() item!: Inventory;
  @Input() hasKey = false;
  @Input() hasLockpick = false;
  @Input() foundItems: string[] = [];
  @Output() close = new EventEmitter<void>();
  @Output() unlock = new EventEmitter<void>();
  @Output() lockpick = new EventEmitter<void>();
  @Output() open = new EventEmitter<void>();

  closeModal() { this.close.emit(); }
  onUnlock() { this.unlock.emit(); }
  onLockpick() { this.lockpick.emit(); }
  onOpen() {
    this.open.emit();
  }
}
