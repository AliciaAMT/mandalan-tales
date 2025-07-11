import { Component, Input, Output, EventEmitter } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule, ModalController } from '@ionic/angular';

@Component({
  selector: 'app-result-modal',
  standalone: true,
  imports: [CommonModule, IonicModule],
  template: `
    <div class="custom-modal-backdrop" (click)="closeModal()"></div>
    <div class="custom-modal">
      <div class="custom-modal-header">
        <h2>{{ title }}</h2>
        <button class="close-btn" (click)="closeModal()">&times;</button>
      </div>
      <div class="custom-modal-content">
        <p>{{ message }}</p>

        <div *ngIf="items && items.length > 0" class="found-items">
          <h3>Items Found:</h3>
          <ul>
            <li *ngFor="let item of items">{{ item }}</li>
          </ul>
        </div>

        <div *ngIf="experience > 0" class="experience">
          <p><strong>Experience Gained: +{{ experience }}</strong></p>
        </div>

        <div class="custom-modal-actions">
          <button (click)="closeModal()">Close</button>
        </div>
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

    .found-items {
      margin: 15px 0;
    }

    .found-items h3 {
      color: #ffd700;
      margin-bottom: 10px;
    }

    .found-items ul {
      margin: 10px 0;
      padding-left: 20px;
    }

    .found-items li {
      margin: 5px 0;
      color: #fff;
    }

    .experience {
      margin: 15px 0;
      padding: 10px;
      background: rgba(0, 255, 0, 0.1);
      border: 1px solid #00ff00;
      border-radius: 4px;
    }

    .custom-modal-actions {
      margin-top: 20px;
      text-align: center;
    }
  `]
})
export class ResultModalComponent {
  @Input() title: string = 'Result';
  @Input() message: string = '';
  @Input() items: string[] = [];
  @Input() experience: number = 0;
  @Output() close = new EventEmitter<void>();

  constructor(private modalCtrl: ModalController) {}

  closeModal() {
    this.close.emit();
    this.modalCtrl.dismiss();
  }
}
