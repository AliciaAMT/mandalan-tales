import { Component, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { IonicModule, ActionSheetController, ModalController } from '@ionic/angular';
import { RouterModule } from '@angular/router';
import { AppHeaderComponent } from 'src/app/shared/header/app-header.component';
import { AppFooterComponent } from 'src/app/shared/footer/app-footer.component';

@Component({
  selector: 'app-create-character',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule, IonicModule, RouterModule, AppHeaderComponent, AppFooterComponent],
  templateUrl: './create-character.page.html',
  styleUrls: ['./create-character.page.scss'],
})
export class CreateCharacterPage {
  private fb: FormBuilder = inject(FormBuilder);
  private actionSheetCtrl: ActionSheetController = inject(ActionSheetController);
  private modalCtrl: ModalController = inject(ModalController);

  characterForm: FormGroup;
  totalPoints = 36;
  formError: string | null = null;

  races = ['Human', 'Elf', 'Dwarf', 'Orc'];
  classes = ['Warrior', 'Mage', 'Thief', 'Healer'];

  // Portrait options with display names and image paths
  portraitOptions = [
    { id: 'male1', name: 'Male 1', image: 'assets/portraits/male1i.png', gender: 'male' },
    { id: 'male2', name: 'Male 2', image: 'assets/portraits/male2i.png', gender: 'male' },
    { id: 'male3', name: 'Male 3', image: 'assets/portraits/male3i.png', gender: 'male' },
    { id: 'male4', name: 'Male 4', image: 'assets/portraits/male4i.png', gender: 'male' },
    { id: 'male5', name: 'Male 5', image: 'assets/portraits/male5i.png', gender: 'male' },
    { id: 'male6', name: 'Male 6', image: 'assets/portraits/male6i.png', gender: 'male' },
    { id: 'male7', name: 'Male 7', image: 'assets/portraits/male7i.png', gender: 'male' },
    { id: 'male8', name: 'Male 8', image: 'assets/portraits/male8i.png', gender: 'male' },
    { id: 'male9', name: 'Male 9', image: 'assets/portraits/male9i.png', gender: 'male' },
    { id: 'male10', name: 'Male 10', image: 'assets/portraits/male10i.png', gender: 'male' },
    { id: 'female1', name: 'Female 1', image: 'assets/portraits/female1i.png', gender: 'female' },
    { id: 'female2', name: 'Female 2', image: 'assets/portraits/female2i.png', gender: 'female' },
    { id: 'female3', name: 'Female 3', image: 'assets/portraits/female3i.png', gender: 'female' },
    { id: 'female4', name: 'Female 4', image: 'assets/portraits/female4i.png', gender: 'female' },
    { id: 'female5', name: 'Female 5', image: 'assets/portraits/female5i.png', gender: 'female' },
    { id: 'female6', name: 'Female 6', image: 'assets/portraits/female6i.png', gender: 'female' },
    { id: 'female7', name: 'Female 7', image: 'assets/portraits/female7i.png', gender: 'female' },
    { id: 'female8', name: 'Female 8', image: 'assets/portraits/female8i.png', gender: 'female' },
    { id: 'female9', name: 'Female 9', image: 'assets/portraits/female9i.png', gender: 'female' },
    { id: 'female10', name: 'Female 10', image: 'assets/portraits/female10i.png', gender: 'female' }
  ];

  selectedPortrait = '';

  constructor() {
    this.characterForm = this.fb.group({
      name: ['', Validators.required],
      race: ['', Validators.required],
      class: ['', Validators.required],
      gender: ['', Validators.required],
      stats: this.fb.group({
        strength: [0],
        agility: [0],
        wisdom: [0],
        luck: [0],
        speed: [0],
        accuracy: [0]
      })
    });

    // Watch for gender changes and clear portrait if gender changes
    this.characterForm.get('gender')?.valueChanges.subscribe(newGender => {
      if (this.selectedPortrait) {
        const currentPortrait = this.portraitOptions.find(p => p.id === this.selectedPortrait);
        if (currentPortrait && currentPortrait.gender !== newGender) {
          this.selectedPortrait = '';
        }
      }
    });
  }

  get allocatedPoints(): number {
    const stats = this.characterForm.get('stats')?.value as { [key: string]: number };
    return Object.values(stats).reduce((a, b) => a + b, 0);
  }

  getStatDisplayName(stat: string): string {
    const statNames: { [key: string]: string } = {
      strength: 'Strength',
      agility: 'Agility',
      wisdom: 'Wisdom',
      luck: 'Luck',
      speed: 'Speed',
      accuracy: 'Accuracy'
    };
    return statNames[stat] || stat.charAt(0).toUpperCase() + stat.slice(1);
  }

  getFilteredPortraitOptions() {
    const selectedGender = this.characterForm.get('gender')?.value;
    if (!selectedGender) {
      return this.portraitOptions; // Show all if no gender selected
    }
    return this.portraitOptions.filter(portrait => portrait.gender === selectedGender);
  }

  async openPortraitSelector() {
    const selectedGender = this.characterForm.get('gender')?.value;

    if (!selectedGender) {
      // Show alert if no gender is selected
      const alert = await this.actionSheetCtrl.create({
        header: 'Select Gender First',
        message: 'Please select a gender before choosing a portrait.',
        buttons: ['OK']
      });
      await alert.present();
      return;
    }

    const modal = await this.modalCtrl.create({
      component: PortraitSelectorModal,
      componentProps: {
        portraitOptions: this.getFilteredPortraitOptions(),
        selectedPortrait: this.selectedPortrait
      }
    });

    await modal.present();

    const { data } = await modal.onWillDismiss();
    if (data && data.selectedPortrait) {
      this.selectedPortrait = data.selectedPortrait;
    }
  }

  getSelectedPortraitImage(): string {
    if (!this.selectedPortrait) return '';
    const portrait = this.portraitOptions.find(p => p.id === this.selectedPortrait);
    return portrait ? portrait.image : '';
  }

  getSelectedPortraitName(): string {
    if (!this.selectedPortrait) return 'No portrait selected';
    const portrait = this.portraitOptions.find(p => p.id === this.selectedPortrait);
    return portrait ? portrait.name : 'Unknown portrait';
  }

  onSubmit(): void {
    this.formError = null;

    if (this.characterForm.valid && this.allocatedPoints <= this.totalPoints) {
      const formData = this.characterForm.value;
      const characterData = {
        ...formData,
        portrait: this.selectedPortrait,
        createdAt: Date.now()
      };

      console.log('Character Created:', characterData);
      // TODO: Save to Firebase
    } else {
      this.formError = 'Please fill in all required fields and ensure you have not exceeded the point limit.';
    }
  }
}

// Portrait Selector Modal Component
@Component({
  selector: 'portrait-selector-modal',
  template: `
    <ion-header>
      <ion-toolbar>
        <ion-title>Choose Portrait</ion-title>
        <ion-buttons slot="end">
          <ion-button (click)="dismiss()">Cancel</ion-button>
        </ion-buttons>
      </ion-toolbar>
    </ion-header>
    <ion-content class="ion-padding">
      <div class="portrait-grid">
        <div
          *ngFor="let portrait of portraitOptions"
          class="portrait-item"
          [class.selected]="portrait.id === selectedPortrait"
          (click)="selectPortrait(portrait.id)"
          tabindex="0"
          role="button"
          [attr.aria-label]="'Select ' + portrait.name + ' portrait'"
          (keydown.enter)="selectPortrait(portrait.id)"
          (keydown.space)="selectPortrait(portrait.id)">
          <ion-img [src]="portrait.image" [alt]="portrait.name"></ion-img>
          <p class="portrait-name">{{ portrait.name }}</p>
        </div>
      </div>
    </ion-content>
  `,
  styles: [`
    .portrait-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 1rem;
      padding: 1rem;
    }

    .portrait-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 0.5rem;
      border: 2px solid transparent;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
      background: rgba(255, 255, 255, 0.05);
    }

    .portrait-item:hover {
      border-color: var(--ion-color-primary);
      background: rgba(255, 255, 255, 0.1);
    }

    .portrait-item.selected {
      border-color: var(--ion-color-primary);
      background: rgba(var(--ion-color-primary-rgb), 0.2);
      box-shadow: 0 0 10px var(--ion-color-primary);
    }

    .portrait-item:focus {
      outline: 2px solid white;
      outline-offset: 2px;
    }

    .portrait-item ion-img {
      width: 80px;
      height: 80px;
      border-radius: 6px;
      object-fit: cover;
    }

    .portrait-name {
      margin: 0.5rem 0 0 0;
      font-size: 0.8rem;
      text-align: center;
      color: var(--ion-color-light);
    }
  `],
  standalone: true,
  imports: [CommonModule, IonicModule]
})
export class PortraitSelectorModal {
  portraitOptions: any[] = [];
  selectedPortrait: string = '';

  constructor(private modalCtrl: ModalController) {}

  selectPortrait(portraitId: string) {
    this.selectedPortrait = portraitId;
    this.dismiss(portraitId);
  }

  dismiss(selectedPortrait?: string) {
    this.modalCtrl.dismiss({
      selectedPortrait: selectedPortrait || this.selectedPortrait
    });
  }
}
