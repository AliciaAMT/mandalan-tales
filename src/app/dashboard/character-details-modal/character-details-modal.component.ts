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
          class="delete-button">
          <ion-icon slot="start" name="trash-outline"></ion-icon>
          Delete Character
        </ion-button>
      </div>
    </ion-content>
  `,
  styles: [`
    .character-details {
      max-width: 600px;
      margin: 0 auto;
    }

    .character-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 8px;
    }

    .portrait-container {
      flex-shrink: 0;
    }

    .character-portrait {
      width: 80px;
      height: 80px;
      border-radius: 8px;
      object-fit: cover;
    }

    .character-info h2 {
      margin: 0 0 0.5rem 0;
      color: #f5d97e;
      font-size: 1.5rem;
    }

    .character-subtitle {
      margin: 0 0 0.25rem 0;
      color: #ccc;
      font-size: 1rem;
    }

    .character-level {
      margin: 0 0 0.25rem 0;
      color: #4caf50;
      font-weight: 600;
    }

    .character-gender {
      margin: 0;
      color: #888;
      font-size: 0.9rem;
    }

    .stats-grid, .resistances-grid, .skills-grid, .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0.75rem;
    }

    .stat-item, .resistance-item, .skill-item, .info-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem;
      background: rgba(255, 255, 255, 0.03);
      border-radius: 4px;
    }

    .stat-label, .resistance-label, .skill-label, .info-label {
      color: #ccc;
      font-size: 0.9rem;
    }

    .stat-value, .resistance-value, .skill-value, .info-value {
      color: #f5d97e;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .delete-button {
      margin-top: 2rem;
    }

    ion-card {
      margin-bottom: 1rem;
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
    IonIcon
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
            this.deleteCharacter();
          }
        }
      ]
    });

    await alert.present();
  }

  async deleteCharacter() {
    try {
      // Show loading alert
      const loadingAlert = await this.alertCtrl.create({
        header: 'Deleting Character',
        message: 'Removing character and all associated data...',
        backdropDismiss: false
      });
      await loadingAlert.present();

      // Use the comprehensive deletion service
      await this.characterDeletionService.deleteCharacterCompletely(
        this.character.id!,
        this.character.name
      );

      // Verify deletion was successful
      const verificationResult = await this.characterDeletionService.verifyCharacterDeletion(
        this.character.id!,
        this.character.name
      );

      await loadingAlert.dismiss();

      if (verificationResult) {
        // Show success message
        const successAlert = await this.alertCtrl.create({
          header: 'Character Deleted',
          message: `"${this.character.name}" and all associated data have been permanently removed.`,
          buttons: ['OK']
        });
        await successAlert.present();

        // Dismiss modal with deletion confirmation
        this.modalCtrl.dismiss({ deleted: true });
      } else {
        // Show warning about potential incomplete deletion
        const warningAlert = await this.alertCtrl.create({
          header: 'Deletion Warning',
          message: 'Character was deleted but some associated data may still exist. Please contact support if you notice any issues.',
          buttons: ['OK']
        });
        await warningAlert.present();

        // Still dismiss modal as main character was deleted
        this.modalCtrl.dismiss({ deleted: true, warning: true });
      }
    } catch (error) {
      console.error('Error deleting character:', error);

      // Show error alert
      const errorAlert = await this.alertCtrl.create({
        header: 'Deletion Failed',
        message: `Failed to delete character: ${error}. Please try again or contact support.`,
        buttons: ['OK']
      });
      await errorAlert.present();
    }
  }
}
