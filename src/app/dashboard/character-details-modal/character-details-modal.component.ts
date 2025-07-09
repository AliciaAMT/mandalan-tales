import { Component, Input, inject } from '@angular/core';
import {
  ModalController,
  AlertController,
  IonHeader,
  IonToolbar,
  IonTitle,
  IonButtons,
  IonButton,
  IonContent,
  IonCard,
  IonCardHeader,
  IonCardTitle,
  IonCardContent,
  IonIcon
} from '@ionic/angular/standalone';
import { CommonModule } from '@angular/common';
import { CharStats } from '../../game/models/charstats.model';
import { CharacterDeletionService } from '../../game/services/character-deletion.service';
import { FocusManagerDirective } from '../../shared/focus-manager.directive';

@Component({
  selector: 'app-character-details-modal',
  template: `
    <ion-header>
      <ion-toolbar>
        <ion-title>Character Details</ion-title>
        <ion-buttons slot="end">
          <ion-button (click)="dismiss()">Close</ion-button>
        </ion-buttons>
      </ion-toolbar>
    </ion-header>

    <ion-content class="ion-padding">
      <div class="character-details" *ngIf="character">
        <!-- Character Header -->
        <div class="character-header">
          <div class="portrait-container">
            <img
              [src]="'/assets/portraits/transparent/' + character.portrait + '.png'"
              [alt]="character.name + ' portrait'"
              class="character-portrait"
            />
          </div>
          <div class="character-info">
            <h2>{{ character.name }}</h2>
            <p class="character-subtitle">{{ character.race }} {{ character.class }}</p>
            <p class="character-level">Level {{ character.level }}</p>
            <p class="character-gender">{{ character.gender | titlecase }}</p>
          </div>
        </div>

        <!-- Stats Section -->
        <ion-card>
          <ion-card-header>
            <ion-card-title>Combat Stats</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            <div class="stats-grid">
              <div class="stat-item">
                <span class="stat-label">Health:</span>
                <span class="stat-value">{{ character.life }}/{{ character.maxLife }}</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Mana:</span>
                <span class="stat-value">{{ character.mana }}/{{ character.maxMana }}</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Strength:</span>
                <span class="stat-value">{{ character.strength }}</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Agility:</span>
                <span class="stat-value">{{ character.agility }}</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Wisdom:</span>
                <span class="stat-value">{{ character.wisdom }}</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Speed:</span>
                <span class="stat-value">{{ character.speed }}</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Accuracy:</span>
                <span class="stat-value">{{ character.accuracy }}</span>
              </div>
              <div class="stat-item">
                <span class="stat-label">Luck:</span>
                <span class="stat-value">{{ character.luck }}</span>
              </div>
            </div>
          </ion-card-content>
        </ion-card>

        <!-- Resistances Section -->
        <ion-card>
          <ion-card-header>
            <ion-card-title>Resistances</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            <div class="resistances-grid">
              <div class="resistance-item">
                <span class="resistance-label">Fire:</span>
                <span class="resistance-value">{{ character.fireResist }}%</span>
              </div>
              <div class="resistance-item">
                <span class="resistance-label">Ice:</span>
                <span class="resistance-value">{{ character.iceResist }}%</span>
              </div>
              <div class="resistance-item">
                <span class="resistance-label">Air:</span>
                <span class="resistance-value">{{ character.airResist }}%</span>
              </div>
              <div class="resistance-item">
                <span class="resistance-label">Earth:</span>
                <span class="resistance-value">{{ character.earthResist }}%</span>
              </div>
              <div class="resistance-item">
                <span class="resistance-label">Light:</span>
                <span class="resistance-value">{{ character.lightResist }}%</span>
              </div>
              <div class="resistance-item">
                <span class="resistance-label">Dark:</span>
                <span class="resistance-value">{{ character.darkResist }}%</span>
              </div>
              <div class="resistance-item">
                <span class="resistance-label">Poison:</span>
                <span class="resistance-value">{{ character.poisonResist }}%</span>
              </div>
              <div class="resistance-item">
                <span class="resistance-label">Mind:</span>
                <span class="resistance-value">{{ character.mindResist }}%</span>
              </div>
            </div>
          </ion-card-content>
        </ion-card>

        <!-- Skills Section -->
        <ion-card>
          <ion-card-header>
            <ion-card-title>Skills</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            <div class="skills-grid">
              <div class="skill-item">
                <span class="skill-label">Cooking:</span>
                <span class="skill-value">{{ character.cooking }}</span>
              </div>
              <div class="skill-item">
                <span class="skill-label">Alchemy:</span>
                <span class="skill-value">{{ character.alchemy }}</span>
              </div>
              <div class="skill-item">
                <span class="skill-label">Enchanting:</span>
                <span class="skill-value">{{ character.enchanting }}</span>
              </div>
              <div class="skill-item">
                <span class="skill-label">Lockpicking:</span>
                <span class="skill-value">{{ character.lockpicking }}</span>
              </div>
              <div class="skill-item">
                <span class="skill-label">Magic Find:</span>
                <span class="skill-value">{{ character.magicFind }}%</span>
              </div>
            </div>
          </ion-card-content>
        </ion-card>

        <!-- Character Info -->
        <ion-card>
          <ion-card-header>
            <ion-card-title>Character Info</ion-card-title>
          </ion-card-header>
          <ion-card-content>
            <div class="info-grid">
              <div class="info-item">
                <span class="info-label">Experience:</span>
                <span class="info-value">{{ character.experience }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Skill Points:</span>
                <span class="info-value">{{ character.skillPoints }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Condition:</span>
                <span class="info-value">{{ character.cond }}</span>
              </div>
              <div class="info-item">
                <span class="info-label">Created:</span>
                <span class="info-value">{{ character.createdAt | date:'medium' }}</span>
              </div>
            </div>
          </ion-card-content>
        </ion-card>

        <!-- Delete Character Button -->
        <ion-button
          expand="block"
          color="danger"
          (click)="confirmDelete()"
          appFocusManager="remove"
        >
          <ion-icon name="trash-outline" slot="start"></ion-icon>
          Delete Character
        </ion-button>
      </div>
    </ion-content>
  `,
  styles: [`
    .character-details {
      max-width: 800px;
      margin: 0 auto;
    }

    .character-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
      padding: 1rem;
      background: linear-gradient(135deg, #2c2c2c, #1a1a1a);
      border-radius: 12px;
      color: #ffffff;
      border: 1px solid #404040;
    }

    .portrait-container {
      flex-shrink: 0;
    }

    .character-portrait {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 3px solid rgba(255, 255, 255, 0.2);
      object-fit: cover;
    }

    .character-info h2 {
      margin: 0 0 0.5rem 0;
      font-size: 1.5rem;
      font-weight: bold;
      color: #f5d97e;
    }

    .character-subtitle {
      margin: 0 0 0.25rem 0;
      font-size: 1rem;
      color: #cccccc;
    }

    .character-level {
      margin: 0 0 0.25rem 0;
      font-size: 0.9rem;
      color: #4caf50;
      font-weight: 600;
    }

    .character-gender {
      margin: 0;
      font-size: 0.9rem;
      color: #888888;
    }

    .stats-grid, .resistances-grid, .skills-grid, .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
    }

    .stat-item, .resistance-item, .skill-item, .info-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem;
      background: var(--ion-color-light);
      border-radius: 8px;
    }

    .stat-label, .resistance-label, .skill-label, .info-label {
      font-weight: 500;
      color: var(--ion-color-medium);
    }

    .stat-value, .resistance-value, .skill-value, .info-value {
      font-weight: bold;
      color: var(--ion-color-dark);
    }

    ion-card {
      margin-bottom: 1rem;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    ion-card-header {
      padding-bottom: 0.5rem;
    }

    ion-card-title {
      color: #f5d97e;
      font-size: 1.1rem;
    }

    @media (max-width: 480px) {
      .stats-grid, .resistances-grid, .skills-grid, .info-grid {
        grid-template-columns: 1fr;
      }

      .character-header {
        flex-direction: column;
        text-align: center;
      }
    }
  `],
  standalone: true,
  imports: [
    CommonModule,
    IonHeader,
    IonToolbar,
    IonTitle,
    IonButtons,
    IonButton,
    IonContent,
    IonCard,
    IonCardHeader,
    IonCardTitle,
    IonCardContent,
    IonIcon,
    FocusManagerDirective
  ]
})
export class CharacterDetailsModalComponent {
  @Input() character!: CharStats;

  private modalCtrl: ModalController = inject(ModalController);
  private alertCtrl: AlertController = inject(AlertController);
  private characterDeletionService: CharacterDeletionService = inject(CharacterDeletionService);

  dismiss() {
    this.modalCtrl.dismiss();
  }

  async confirmDelete() {
    FocusManagerDirective.removeFocusFromNonAlertElements();

    const alert = await this.alertCtrl.create({
      header: 'Delete Character',
      message: `Are you sure you want to delete "${this.character.name}"? This will permanently remove the character and ALL associated data including inventory, spells, skills, quests, and game progress. This action cannot be undone.`,
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          cssClass: 'secondary'
        },
        {
          text: 'Delete Permanently',
          role: 'destructive',
          cssClass: 'danger',
          handler: () => {
            console.log('Delete Permanently button clicked');
            (async () => {
              await this.deleteCharacter();
            })();
          }
        }
      ],
      keyboardClose: true,
      backdropDismiss: false
    });

    await alert.present();
  }

  async deleteCharacter() {
    try {
      FocusManagerDirective.removeFocusFromNonAlertElements();

      console.log('Showing loading alert...');
      const loadingAlert = await this.alertCtrl.create({
        header: 'Deleting Character',
        message: 'Removing character and all associated data...',
        backdropDismiss: false,
        keyboardClose: false
      });
      await loadingAlert.present();
      console.log('Loading alert presented.');

      console.log('Calling deleteCharacterCompletely...');
      await this.characterDeletionService.deleteCharacterCompletely(
        this.character.id!,
        this.character.name
      );
      console.log('deleteCharacterCompletely finished.');

      console.log('Dismissing loading alert...');
      await loadingAlert.dismiss();
      console.log('Loading alert dismissed.');

      console.log('About to dismiss modal after successful deletion');
      this.modalCtrl.dismiss({ deleted: true });
      console.log('Modal dismiss called');
    } catch (error) {
      console.error('Error deleting character:', error);

      // Dismiss loading alert if it's still showing
      try {
        const loadingAlert = document.querySelector('ion-alert');
        if (loadingAlert) {
          await this.alertCtrl.dismiss();
        }
      } catch (dismissError) {
        console.warn('Could not dismiss loading alert:', dismissError);
      }

      // Remove focus from non-alert elements before showing error alert
      FocusManagerDirective.removeFocusFromNonAlertElements();

      // Show error alert
      const errorAlert = await this.alertCtrl.create({
        header: 'Deletion Failed',
        message: `Failed to delete character: ${error}. Please try again or contact support.`,
        buttons: ['OK'],
        keyboardClose: true,
        backdropDismiss: false
      });
      await errorAlert.present();
      await errorAlert.onDidDismiss();
    }
  }
}
