import { Component, inject, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { IonicModule, ActionSheetController, ModalController } from '@ionic/angular';
import { RouterModule, Router } from '@angular/router';
import { AppHeaderComponent } from 'src/app/shared/header/app-header.component';
import { AppFooterComponent } from 'src/app/shared/footer/app-footer.component';
import { RACE_BONUSES, CLASS_BONUSES, getRaceBonus, getClassBonus } from 'src/app/game/config/character-config';
import { CharacterService } from 'src/app/game/services/character.service';
import { CharStats } from 'src/app/game/models/charstats.model';

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
  private router: Router = inject(Router);
  private characterService: CharacterService = inject(CharacterService);

  characterForm: FormGroup;
  formError: string | null = null;
  generatedStats: any = null;

  races = RACE_BONUSES.map(race => race.name);
  classes = CLASS_BONUSES.map(cls => cls.name);

  portraits: string[] = [
    ...Array.from({ length: 10 }, (_, i) => `male${i + 1}`),
    ...Array.from({ length: 10 }, (_, i) => `female${i + 1}`)
  ];

  // Portrait options with display names and image paths
  portraitOptions = [
    { id: 'male1', name: 'Male 1', image: 'assets/portraits/transparent/male1.png', gender: 'male' },
    { id: 'male2', name: 'Male 2', image: 'assets/portraits/transparent/male2.png', gender: 'male' },
    { id: 'male3', name: 'Male 3', image: 'assets/portraits/transparent/male3.png', gender: 'male' },
    { id: 'male4', name: 'Male 4', image: 'assets/portraits/transparent/male4.png', gender: 'male' },
    { id: 'male5', name: 'Male 5', image: 'assets/portraits/transparent/male5.png', gender: 'male' },
    { id: 'male6', name: 'Male 6', image: 'assets/portraits/transparent/male6.png', gender: 'male' },
    { id: 'male7', name: 'Male 7', image: 'assets/portraits/transparent/male7.png', gender: 'male' },
    { id: 'male8', name: 'Male 8', image: 'assets/portraits/transparent/male8.png', gender: 'male' },
    { id: 'male9', name: 'Male 9', image: 'assets/portraits/transparent/male9.png', gender: 'male' },
    { id: 'male10', name: 'Male 10', image: 'assets/portraits/transparent/male10.png', gender: 'male' },
    { id: 'female1', name: 'Female 1', image: 'assets/portraits/transparent/female1.png', gender: 'female' },
    { id: 'female2', name: 'Female 2', image: 'assets/portraits/transparent/female2.png', gender: 'female' },
    { id: 'female3', name: 'Female 3', image: 'assets/portraits/transparent/female3.png', gender: 'female' },
    { id: 'female4', name: 'Female 4', image: 'assets/portraits/transparent/female4.png', gender: 'female' },
    { id: 'female5', name: 'Female 5', image: 'assets/portraits/transparent/female5.png', gender: 'female' },
    { id: 'female6', name: 'Female 6', image: 'assets/portraits/transparent/female6.png', gender: 'female' },
    { id: 'female7', name: 'Female 7', image: 'assets/portraits/transparent/female7.png', gender: 'female' },
    { id: 'female8', name: 'Female 8', image: 'assets/portraits/transparent/female8.png', gender: 'female' },
    { id: 'female9', name: 'Female 9', image: 'assets/portraits/transparent/female9.png', gender: 'female' },
    { id: 'female10', name: 'Female 10', image: 'assets/portraits/transparent/female10.png', gender: 'female' }
  ];

  selectedPortrait = '';

  constructor() {
    this.characterForm = this.fb.group({
      name: ['', Validators.required],
      race: ['', Validators.required],
      class: ['', Validators.required],
      gender: ['', Validators.required]
    });

    // Generate initial stats when form changes
    this.characterForm.valueChanges.subscribe(() => {
      this.generateStats();
    });
  }

  // Generate random stats like the old demo
  generateStats(): void {
    const formData = this.characterForm.value;
    if (!formData.race || !formData.class) return;

    // Base stats (like old demo: mt_rand(10,15))
    const baseStats = {
      speed: Math.floor(Math.random() * 6) + 10, // 10-15
      accuracy: Math.floor(Math.random() * 6) + 10,
      strength: Math.floor(Math.random() * 6) + 10,
      agility: Math.floor(Math.random() * 6) + 10,
      wisdom: Math.floor(Math.random() * 6) + 10,
      luck: Math.floor(Math.random() * 6) + 10
    };

    // Base resistances (like old demo: mt_rand(0,10))
    const baseResistances = {
      fireResist: Math.floor(Math.random() * 11), // 0-10
      iceResist: Math.floor(Math.random() * 11),
      airResist: Math.floor(Math.random() * 11),
      earthResist: Math.floor(Math.random() * 11),
      lightResist: Math.floor(Math.random() * 11),
      darkResist: Math.floor(Math.random() * 11),
      poisonResist: Math.floor(Math.random() * 11),
      mindResist: Math.floor(Math.random() * 11),
      holdResist: Math.floor(Math.random() * 11),
      criticalResist: Math.floor(Math.random() * 11),
      bleedResist: Math.floor(Math.random() * 11)
    };

    // Base skills
    const baseSkills = {
      cooking: Math.floor(Math.random() * 11),
      alchemy: 0,
      enchanting: 0,
      lockpicking: 0,
      magicFind: 0
    };

    // Apply race bonuses
    const raceBonus = getRaceBonus(formData.race);
    const classBonus = getClassBonus(formData.class);

    // Helper function to add bonuses safely (no negative stats)
    const addBonus = (base: number, bonus: number | undefined): number => {
      const result = base + (bonus || 0);
      return Math.max(1, result); // Ensure minimum of 1 for all stats
    };

    // Combine base stats with bonuses
    this.generatedStats = {
      // Core stats with bonuses
      speed: addBonus(baseStats.speed,
        (raceBonus?.bonuses.speed || 0) + (classBonus?.bonuses.speed || 0)),
      accuracy: addBonus(baseStats.accuracy,
        (raceBonus?.bonuses.accuracy || 0) + (classBonus?.bonuses.accuracy || 0)),
      strength: addBonus(baseStats.strength,
        (raceBonus?.bonuses.strength || 0) + (classBonus?.bonuses.strength || 0)),
      agility: addBonus(baseStats.agility,
        (raceBonus?.bonuses.agility || 0) + (classBonus?.bonuses.agility || 0)),
      wisdom: addBonus(baseStats.wisdom,
        (raceBonus?.bonuses.wisdom || 0) + (classBonus?.bonuses.wisdom || 0)),
      luck: baseStats.luck, // Luck doesn't get bonuses in the old demo

      // Resistances with bonuses
      fireResist: Math.max(0, baseResistances.fireResist +
        (raceBonus?.bonuses.fireResist || 0) + (classBonus?.bonuses.fireResist || 0)),
      iceResist: Math.max(0, baseResistances.iceResist +
        (raceBonus?.bonuses.iceResist || 0) + (classBonus?.bonuses.iceResist || 0)),
      airResist: Math.max(0, baseResistances.airResist +
        (raceBonus?.bonuses.airResist || 0) + (classBonus?.bonuses.airResist || 0)),
      earthResist: Math.max(0, baseResistances.earthResist +
        (raceBonus?.bonuses.earthResist || 0) + (classBonus?.bonuses.earthResist || 0)),
      lightResist: Math.max(0, baseResistances.lightResist +
        (raceBonus?.bonuses.lightResist || 0) + (classBonus?.bonuses.lightResist || 0)),
      darkResist: Math.max(0, baseResistances.darkResist +
        (raceBonus?.bonuses.darkResist || 0) + (classBonus?.bonuses.darkResist || 0)),
      poisonResist: Math.max(0, baseResistances.poisonResist +
        (raceBonus?.bonuses.poisonResist || 0) + (classBonus?.bonuses.poisonResist || 0)),
      mindResist: Math.max(0, baseResistances.mindResist +
        (raceBonus?.bonuses.mindResist || 0) + (classBonus?.bonuses.mindResist || 0)),
      holdResist: Math.max(0, baseResistances.holdResist +
        (raceBonus?.bonuses.holdResist || 0) + (classBonus?.bonuses.holdResist || 0)),
      criticalResist: Math.max(0, baseResistances.criticalResist +
        (raceBonus?.bonuses.criticalResist || 0) + (classBonus?.bonuses.criticalResist || 0)),
      bleedResist: Math.max(0, baseResistances.bleedResist +
        (raceBonus?.bonuses.bleedResist || 0) + (classBonus?.bonuses.bleedResist || 0)),

      // Skills with bonuses
      cooking: baseSkills.cooking,
      alchemy: baseSkills.alchemy + (classBonus?.bonuses.alchemy || 0),
      enchanting: baseSkills.enchanting + (classBonus?.bonuses.enchanting || 0),
      lockpicking: baseSkills.lockpicking + (classBonus?.bonuses.lockpicking || 0),
      magicFind: baseSkills.magicFind + (raceBonus?.bonuses.magicFind || 0),

      // Life and mana bonuses
      life: raceBonus?.bonuses.life || 0,
      maxLife: raceBonus?.bonuses.maxLife || 0,
      mana: classBonus?.bonuses.mana || 0,
      maxMana: classBonus?.bonuses.maxMana || 0,

      // Skill points
      skillPoints: 5 + (classBonus?.bonuses.skillPoints || 0)
    };
  }

  async openPortraitSelector() {
    const modal = await this.modalCtrl.create({
      component: PortraitSelectorModal,
      componentProps: {
        portraitOptions: this.portraitOptions,
        selectedPortrait: this.selectedPortrait
      },
      backdropDismiss: true,
      showBackdrop: true,
      keyboardClose: true
    });

    await modal.present();

    const { data } = await modal.onWillDismiss();
    if (data && data.selectedPortrait) {
      this.selectedPortrait = data.selectedPortrait;
    }

    // Wait for modal to be fully dismissed before managing focus
    await modal.onDidDismiss();

    // Ensure focus returns to the trigger button after modal dismissal
    setTimeout(() => {
      const portraitButton = document.getElementById('portraitButton');
      if (portraitButton) {
        portraitButton.focus();
      }
    }, 200);
  }

  selectPortrait(option: any): void {
    this.selectedPortrait = option.id;
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

  async onSubmit(): Promise<void> {
    this.formError = null;

    if (this.characterForm.valid && this.selectedPortrait) {
      try {
        const formData = this.characterForm.value;

        // Generate final stats
        this.generateStats();

        // Create character data with all required fields
        const characterData: CharStats = {
          userId: '', // Will be set by the service
          name: formData.name,
          race: formData.race,
          class: formData.class,
          gender: formData.gender,
          portrait: this.selectedPortrait,
          level: 1,
          experience: 0,
          skillPoints: this.generatedStats.skillPoints || 5,
          life: 50 + (this.generatedStats.life || 0),
          maxLife: 50 + (this.generatedStats.maxLife || 0),
          mana: 30 + (this.generatedStats.mana || 0),
          maxMana: 30 + (this.generatedStats.maxMana || 0),
          gold: 0,
          speed: this.generatedStats.speed,
          accuracy: this.generatedStats.accuracy,
          strength: this.generatedStats.strength,
          agility: this.generatedStats.agility,
          wisdom: this.generatedStats.wisdom,
          luck: this.generatedStats.luck,
          guild: '',
          title: 'Peasant',
          cond: 'Good',
          fireResist: this.generatedStats.fireResist,
          iceResist: this.generatedStats.iceResist,
          airResist: this.generatedStats.airResist,
          earthResist: this.generatedStats.earthResist,
          lightResist: this.generatedStats.lightResist,
          darkResist: this.generatedStats.darkResist,
          poisonResist: this.generatedStats.poisonResist,
          mindResist: this.generatedStats.mindResist,
          holdResist: this.generatedStats.holdResist,
          criticalResist: this.generatedStats.criticalResist,
          bleedResist: this.generatedStats.bleedResist,
          cooking: this.generatedStats.cooking,
          alchemy: this.generatedStats.alchemy,
          enchanting: this.generatedStats.enchanting,
          lockpicking: this.generatedStats.lockpicking,
          magicFind: this.generatedStats.magicFind,
          map: 'homeup',
          mapdimensions: 33,
          xaxis: 2,
          yaxis: 2,
          savemap: 'homeup',
          savemapdimensions: 33,
          savexaxis: 1,
          saveyaxis: 3,
          createdAt: Date.now(),
          updatedAt: Date.now()
        };

        // Save character to Firebase
        await this.characterService.createCharacter(characterData);

        // Navigate to dashboard
        this.router.navigate(['/dashboard']);
      } catch (error) {
        console.error('Error creating character:', error);

        // Check for specific error types and provide user-friendly messages
        if (error instanceof Error) {
          if (error.message === 'Character name already exists') {
            this.formError = 'A character with this name already exists. Please choose a different name.';
          } else if (error.message === 'User not authenticated') {
            this.formError = 'You must be logged in to create a character. Please log in and try again.';
          } else {
            this.formError = 'Failed to create character. Please try again.';
          }
        } else {
          this.formError = 'Failed to create character. Please try again.';
        }
      }
    } else {
      this.formError = 'Please fill in all required fields and select a portrait.';
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
      <div class="portrait-grid" role="grid" aria-label="Portrait selection grid">
        <div
          *ngFor="let portrait of portraitOptions; let i = index"
          class="portrait-item"
          [class.selected]="portrait.id === selectedPortrait"
          (click)="selectPortrait(portrait.id)"
          role="button"
          tabindex="0"
          [attr.aria-label]="'Select ' + portrait.name + ' portrait'"
          [attr.aria-pressed]="portrait.id === selectedPortrait"
          (keydown)="onPortraitKeydown($event, portrait.id)"
        >
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
      outline: none;
    }

    .portrait-item:hover,
    .portrait-item:focus {
      border-color: var(--ion-color-primary);
      background: rgba(255, 255, 255, 0.1);
      outline: 2px solid #cccccc !important;
      outline-offset: 2px !important;
    }

    .portrait-item.selected {
      border-color: var(--ion-color-primary);
      background: rgba(var(--ion-color-primary-rgb), 0.2);
      box-shadow: 0 0 10px var(--ion-color-primary);
    }

    .portrait-item ion-img {
      width: 80px;
      height: 80px;
      border-radius: 6px;
      object-fit: cover;
      opacity: 1;
      transition: opacity 0.2s ease;
    }

    .portrait-name {
      margin: 0.5rem 0 0 0;
      font-size: 0.8rem;
      text-align: center;
      color: white;
    }
  `],
  standalone: true,
  imports: [CommonModule, IonicModule]
})
export class PortraitSelectorModal implements OnInit {
  portraitOptions: any[] = [];
  selectedPortrait: string = '';

  constructor(private modalCtrl: ModalController) {}

  ngOnInit() {
    // Listen for modal dismissal events
    this.modalCtrl.getTop().then(modal => {
      if (modal) {
        modal.onWillDismiss().then(() => {
          this.removeAllFocus();
        });
      }
    });
  }

  selectPortrait(portraitId: string) {
    this.selectedPortrait = portraitId;
    this.dismiss(portraitId);
  }

  onPortraitKeydown(event: KeyboardEvent, portraitId: string) {
    if (event.key === 'Enter' || event.key === ' ') {
      event.preventDefault();
      this.selectPortrait(portraitId);
    } else if (event.key === 'Escape') {
      event.preventDefault();
      this.dismiss();
    }
  }

  dismiss(selectedPortrait?: string) {
    // Remove focus from all elements in the modal
    this.removeAllFocus();

    this.modalCtrl.dismiss({
      selectedPortrait: selectedPortrait || this.selectedPortrait
    });
  }

  private removeAllFocus() {
    // Remove focus from any focused element
    if (document.activeElement instanceof HTMLElement) {
      document.activeElement.blur();
    }

    // Also remove focus from any elements within the modal
    const modalElement = document.querySelector('ion-modal');
    if (modalElement) {
      const focusableElements = modalElement.querySelectorAll('button, [tabindex], input, select, textarea, a[href]');
      focusableElements.forEach((element: Element) => {
        if (element instanceof HTMLElement) {
          element.blur();
        }
      });
    }
  }
}
