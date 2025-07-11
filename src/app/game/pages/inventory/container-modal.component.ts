import { Component, Input, Output, EventEmitter } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Inventory } from '../../models/inventory.model';
import { IonicModule } from '@ionic/angular';
import { FocusTrapDirective } from '../../../shared/focus-trap.directive';

@Component({
  selector: 'app-container-modal',
  standalone: true,
  imports: [CommonModule, IonicModule, FocusTrapDirective],
  template: `
    <div class="custom-modal-backdrop" (click)="closeModal()"></div>
    <div class="custom-modal" appFocusTrap tabindex="-1">
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
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .custom-modal {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      z-index: 1001;
      max-width: 90vw;
      max-height: 90vh;
      overflow-y: auto;
      min-width: 300px;
    }

    .custom-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 20px;
      border-bottom: 1px solid #e0e0e0;
      background: #f8f9fa;
      border-radius: 8px 8px 0 0;
    }

    .custom-modal-header h2 {
      margin: 0;
      font-size: 1.2rem;
      color: #333;
    }

    .close-btn {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: #666;
      padding: 0;
      width: 30px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      transition: background-color 0.2s;
    }

    .close-btn:hover {
      background-color: #e0e0e0;
    }

    .custom-modal-content {
      padding: 20px;
    }

    .custom-modal-content p {
      margin: 0 0 16px 0;
      color: #333;
      line-height: 1.5;
    }

    .custom-modal-content button {
      background: #007bff;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 8px;
      margin-bottom: 8px;
      font-size: 14px;
      transition: background-color 0.2s;
    }

    .custom-modal-content button:hover {
      background: #0056b3;
    }

    .custom-modal-content button:disabled {
      background: #ccc;
      cursor: not-allowed;
    }

    .custom-modal-content ul {
      margin: 16px 0;
      padding-left: 20px;
    }

    .custom-modal-content li {
      margin-bottom: 4px;
      color: #333;
    }
  `]
})
export class ContainerModalComponent {
  @Input() item!: Inventory;
  @Input() hasKey: boolean = false;
  @Input() hasLockpick: boolean = false;
  @Input() foundItems: string[] = [];

  @Output() unlock = new EventEmitter<void>();
  @Output() lockpick = new EventEmitter<void>();
  @Output() open = new EventEmitter<void>();
  @Output() close = new EventEmitter<void>();

  onUnlock(): void {
    this.unlock.emit();
  }

  onLockpick(): void {
    this.lockpick.emit();
  }

  onOpen(): void {
    this.open.emit();
  }

  closeModal(): void {
    this.close.emit();
  }
}
