import { Component, inject } from '@angular/core';
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

    this.generatedStats = {
      ...baseStats,
      ...baseResistances,
      ...baseSkills,
      // Apply bonuses
      ...(raceBonus?.bonuses || {}),
      ...(classBonus?.bonuses || {})
    };
  }

  async openPortraitSelector() {
    const modal = await this.modalCtrl.create({
      component: PortraitSelectorModal,
      componentProps: {
        portraitOptions: this.portraitOptions,
        selectedPortrait: this.selectedPortrait
      }
    });

    await modal.present();

    const { data } = await modal.onWillDismiss();
    if (data && data.selectedPortrait) {
      this.selectedPortrait = data.selectedPortrait;
    }
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
          id: '', // Will be set by Firebase
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
          speed: this.generatedStats.speed,
          accuracy: this.generatedStats.accuracy,
          strength: this.generatedStats.strength,
          agility: this.generatedStats.agility,
          wisdom: this.generatedStats.wisdom,
          luck: this.generatedStats.luck,
          guild: '',
          title: '',
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
          map: '1',
          mapdimensions: 1,
          xaxis: 0,
          yaxis: 0,
          savemap: '1',
          savemapdimensions: 1,
          savexaxis: 0,
          saveyaxis: 0,
          createdAt: Date.now(),
          updatedAt: Date.now()
        };

        // Save character to Firebase
        await this.characterService.createCharacter(characterData);

        // Navigate to game page
        this.router.navigate(['/game']);
      } catch (error) {
        console.error('Error creating character:', error);
        this.formError = 'Failed to create character. Please try again.';
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
      outline: 2px solid #cccccc !important;
      outline-offset: 2px !important;
      border-color: #cccccc !important;
      background: rgba(255, 255, 255, 0.1) !important;
    }

    .portrait-item:focus ion-img {
      opacity: 1 !important;
      filter: none !important;
    }

    .portrait-item:focus .portrait-name {
      color: #cccccc !important;
    }

    .portrait-item ion-img {
      width: 80px;
      height: 80px;
      border-radius: 6px;
      object-fit: cover;
      opacity: 1;
      transition: opacity 0.2s ease;
    }

    .portrait-item:focus-within ion-img {
      opacity: 1 !important;
      filter: none !important;
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
