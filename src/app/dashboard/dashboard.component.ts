import { Component, OnInit, inject, effect } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
import { CharacterService } from '../game/services/character.service';
import { CharStats } from '../game/models/charstats.model';
import { CommonModule } from '@angular/common';
import { User } from '@angular/fire/auth';
import { Router, RouterModule } from '@angular/router';
import { AuthService } from '../services/auth.service';
import { ModalController, AlertController } from '@ionic/angular/standalone';
import { CharacterDetailsModalComponent } from './character-details-modal/character-details-modal.component';
import { SettingsService } from '../game/services/settings.service';
import { DEFAULT_THEME_COLOR } from '../game/models/settings.model';
import { FormsModule } from '@angular/forms';
import { FocusManagerDirective } from '../shared/focus-manager.directive';
import { addIcons } from 'ionicons';
import { refreshCircleOutline } from 'ionicons/icons';
// import { AngularFirestoreModule } from '@angular/fire/compat/firestore';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, AppFooterComponent, STANDALONE_IMPORTS, CommonModule, RouterModule, FormsModule, FocusManagerDirective],
})
export class DashboardComponent implements OnInit {
  private characterService: CharacterService = inject(CharacterService);
  private authService: AuthService = inject(AuthService);
  private router: Router = inject(Router);
  private modalCtrl: ModalController = inject(ModalController);
  private settingsService: SettingsService = inject(SettingsService);
  private alertCtrl: AlertController = inject(AlertController);

  // Expose the character service signal directly
  characters = this.characterService.characters;

  selectedCharacterId: string | null = null;
  maxCharacters = 6;
  currentYear: number = new Date().getFullYear();
  user: User | null = null;

  // Theme properties
  selectedThemeColor: string = DEFAULT_THEME_COLOR;
  presetColors = [
    { name: 'Gold', color: '#6b4e26' },
    { name: 'Blue', color: '#2c5aa0' },
    { name: 'Green', color: '#2d5a2d' },
    { name: 'Purple', color: '#5a2d5a' },
    { name: 'Red', color: '#8b2d2d' },
    { name: 'Orange', color: '#b85a1a' },
    { name: 'Teal', color: '#1a5a5a' },
    { name: 'Black', color: '#000000' }
  ];

  constructor() {
    // Register the refresh-circle-outline icon
    addIcons({ refreshCircleOutline });

    effect(() => {
      if (this.authService.authInitialized() && !this.authService.user()) {
        this.router.navigate(['/login']);
      } else if (this.authService.authInitialized()) {
        const user = this.authService.user();
        if (user && user.emailVerified) {
          this.user = user;
          this.loadUserSettings();
        }
      }
      // Do NOT auto-navigate to dashboard here!
    });
  }

  ngOnInit() {
    // No effect() here!
  }

  ionViewWillEnter() {
    // Reset theme to default gold color when entering dashboard
    const defaultThemeColor = '#6b4e26'; // Default gold color
    document.documentElement.style.setProperty('--theme-color', defaultThemeColor);
    document.documentElement.style.setProperty('--ion-color-primary', defaultThemeColor);
    document.documentElement.style.setProperty('--header-text-color', '#181200');
    // Clear the localStorage theme color to prevent game theme from persisting
    localStorage.removeItem('themeColor');
  }

  async loadUserSettings(): Promise<void> {
    if (this.user) {
      const settings = await this.settingsService.getUserSettings(this.user.uid);
      if (settings) {
        this.selectedThemeColor = settings.themeColor;
        // Don't apply the theme color to the dashboard - keep it as default gold
        // The theme color is only for the game, not the dashboard
      }
    }
  }

  async updateThemeColor(): Promise<void> {
    if (this.user) {
      try {
        await this.settingsService.updateThemeColor(this.user.uid, this.selectedThemeColor);
        // Save the theme color to localStorage for the game to use
        localStorage.setItem('themeColor', this.selectedThemeColor);
        // Don't apply the theme to the dashboard - keep it as default gold
        // The theme will be applied when entering the game
      } catch (error) {
        console.error('Error updating theme color:', error);
      }
    }
  }

  private getTextColorForTheme(themeColor: string): string {
    // Convert hex to RGB and calculate brightness
    const hex = themeColor.replace('#', '');
    const r = parseInt(hex.substr(0, 2), 16);
    const g = parseInt(hex.substr(2, 2), 16);
    const b = parseInt(hex.substr(4, 2), 16);

    // Calculate relative luminance
    const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;

    // Use white text for dark themes (luminance < 0.5)
    return luminance < 0.5 ? '#ffffff' : '#181200';
  }

  async selectPresetColor(color: string): Promise<void> {
    this.selectedThemeColor = color;
    await this.updateThemeColor();
  }

  selectCharacter(id: string): void {
    this.selectedCharacterId = id;
  }

  async openCharacterDetails(character: CharStats): Promise<void> {
    const modal = await this.modalCtrl.create({
      component: CharacterDetailsModalComponent,
      componentProps: {
        character: character
      }
    });

    await modal.present();

    const { data } = await modal.onWillDismiss();
    console.log('Modal dismissed with data:', data);
    if (data && data.deleted) {
      // If character was deleted, clear selection if it was the selected character
      if (this.selectedCharacterId === character.id) {
        this.selectedCharacterId = null;
      }
      // Show success alert at dashboard level
      const successAlert = await this.alertCtrl.create({
        header: 'Character Deleted',
        message: `"${character.name}" and all associated data have been permanently removed.`,
        buttons: ['OK'],
        backdropDismiss: false,
        keyboardClose: true
      });
      await successAlert.present();
      await successAlert.onDidDismiss();
    }
  }

  logout(): void {
    this.authService.logout().then(() => {
      this.router.navigate(['/login']);
    });
  }

  startGame(): void {
    const user = this.authService.getCurrentUser();
    console.log('startGame called. user:', user, 'selectedCharacterId:', this.selectedCharacterId);
    if (this.selectedCharacterId && user && user.emailVerified) {
      console.log('Navigating to /game');
      this.router.navigate(['/game']);
    } else if (!user) {
      console.log('No user, redirecting to login');
      this.router.navigate(['/login']);
    } else if (user && !user.emailVerified) {
      console.log('User not verified');
      alert('Please verify your email before entering the game.');
    }
  }

  async resetTestData(character: CharStats): Promise<void> {
    const alert = await this.alertCtrl.create({
      header: 'Reset Character',
      message: `This will completely reset "${character.name}" to a brand new state. This will delete ALL inventory items, clear ALL game progress, and reset ALL flags. This action cannot be undone.`,
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel'
        },
        {
          text: 'Reset Character',
          role: 'destructive',
          handler: () => {
            this.performCharacterReset(character);
          }
        }
      ],
      backdropDismiss: false,
      keyboardClose: true
    });

    await alert.present();
  }

  private async performCharacterReset(character: CharStats): Promise<void> {
    console.log('Performing complete reset for character:', character.name);

    try {
      // 1. Clear all localStorage flags for this character
      const keysToRemove = [];
      for (let i = 0; i < localStorage.length; i++) {
        const key = localStorage.key(i);
        if (key && key.includes(`_${character.name}_`)) {
          keysToRemove.push(key);
        }
      }

      keysToRemove.forEach(key => {
        localStorage.removeItem(key);
        console.log(`Removed localStorage key: ${key}`);
      });

      // 2. Clear inventory for this character from Firestore
      if (character.id) {
        try {
          await this.characterService.clearCharacterInventory(character.id);
          console.log('Cleared inventory from Firestore');
        } catch (error) {
          console.error('Error clearing inventory:', error);
        }
      }

      // 3. Clear replenishment data for this character from Firestore
      try {
        await this.characterService.clearCharacterReplenishment(character.name);
        console.log('Cleared replenishment data from Firestore');
      } catch (error) {
        console.error('Error clearing replenishment data:', error);
      }

      // 4. Reset character stats to default (optional - uncomment if you want this)
      // await this.characterService.resetCharacterStats(character.id);

      console.log('Complete character reset finished for:', character.name);

      // Show success message
      const successAlert = await this.alertCtrl.create({
        header: 'Character Reset Complete',
        message: `"${character.name}" has been completely reset to a brand new state. All inventory, progress, and flags have been cleared.`,
        buttons: ['OK'],
        backdropDismiss: false,
        keyboardClose: true
      });
      await successAlert.present();

    } catch (error) {
      console.error('Error during character reset:', error);

      const errorAlert = await this.alertCtrl.create({
        header: 'Reset Error',
        message: 'There was an error during the reset. Some data may not have been cleared completely.',
        buttons: ['OK'],
        backdropDismiss: false,
        keyboardClose: true
      });
      await errorAlert.present();
    }
  }
}
