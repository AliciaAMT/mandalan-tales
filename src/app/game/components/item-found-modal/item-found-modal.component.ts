import { Component, Input, Output, EventEmitter, HostListener } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { FocusTrapDirective } from '../../../shared/focus-trap.directive';

export interface FoundItem {
  image: string;
  name: string;
  description?: string;
  quantity?: number;
}

@Component({
  selector: 'app-item-found-modal',
  template: `
    <div class="item-found-overlay" *ngIf="open" (click)="close()">
      <div class="item-found-modal" appFocusTrap tabindex="-1" (click)="$event.stopPropagation()">
        <!-- Event Message Section -->
        <div *ngIf="eventMessage" class="event-section">
          <div class="event-icon">
            <ion-icon name="alert-circle-outline" aria-hidden="true"></ion-icon>
          </div>
          <div class="event-info">
            <div class="event-message">{{ eventMessage }}</div>
          </div>
        </div>

        <!-- Items Section -->
        <div *ngIf="items && items.length > 0" class="items-section">
          <div class="items-list">
            <div *ngFor="let item of items" class="item-row">
              <div class="item-portrait">
                <img
                  [src]="getItemImage(item)"
                  [alt]="'Item image: ' + item.name"
                  class="item-image"
                  (error)="onImageError($event)"
                />
              </div>
              <div class="item-info">
                <div class="item-name">
                  {{ item.name }}<span *ngIf="item.quantity"> x{{ item.quantity }}</span>
                </div>
                <div class="item-desc" *ngIf="item.description">{{ item.description }}</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Actions Section -->
        <div *ngIf="actions && actions.length > 0" class="actions-section">
          <div class="actions-list">
            <button
              *ngFor="let action of actions"
              class="action-button"
              (click)="selectAction(action.value)"
              [attr.aria-label]="action.label"
            >
              {{ action.label }}
            </button>
          </div>
        </div>

        <!-- Close Button -->
        <button
          class="close-item-found-btn"
          (click)="close()"
          tabindex="0"
          aria-label="Close"
        >
          ×
        </button>
      </div>
    </div>
  `,
  styleUrls: ['./item-found-modal.component.scss'],
  standalone: true,
  imports: [CommonModule, IonicModule, FocusTrapDirective]
})
export class ItemFoundModalComponent {
  @Input() open = false;
  @Input() items: FoundItem[] = [];
  @Input() eventMessage?: string;
  @Input() actions: { label: string, value: string }[] = [];
  @Output() closed = new EventEmitter<string | void>();

  @HostListener('document:keydown', ['$event'])
  handleKeydown(event: KeyboardEvent) {
    if (this.open && event.key === 'Escape') {
      event.preventDefault();
      this.close();
    }
  }

  close() {
    this.closed.emit();
  }

  selectAction(value: string) {
    this.closed.emit(value);
  }

  getItemImage(item: FoundItem): string {
    const imageName = item.image.toLowerCase().replace(/\s+/g, '');
    return item.image.startsWith('assets/') ? item.image : `assets/items/${imageName}.webp`;
  }

  onImageError(event: any): void {
    if (event?.target) {
      event.target.style.display = 'none';
    }
  }
}
