import { Component, OnInit, inject } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
import { CharacterService } from '../game/services/character.service';
import { CharStats } from '../game/models/charstats.model';
import { CommonModule } from '@angular/common';
import { User } from '@angular/fire/auth';
import { Router, RouterModule } from '@angular/router';
import { AuthService } from '../services/auth.service';
import { ModalController } from '@ionic/angular/standalone';
import { CharacterDetailsModalComponent } from './character-details-modal/character-details-modal.component';
import { SettingsService } from '../game/services/settings.service';
import { DEFAULT_THEME_COLOR } from '../game/models/settings.model';
import { FormsModule } from '@angular/forms';
import { FocusManagerDirective } from '../shared/focus-manager.directive';
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

  async ngOnInit(): Promise<void> {
    const user = this.authService.getCurrentUser();

    if (!user) {
      this.router.navigate(['/login']);
      return;
    }

    this.user = user;
    await this.loadUserSettings();
  }

  async loadUserSettings(): Promise<void> {
    if (this.user) {
      const settings = await this.settingsService.getUserSettings(this.user.uid);
      if (settings) {
        this.selectedThemeColor = settings.themeColor;
      }
    }
  }

  async updateThemeColor(): Promise<void> {
    if (this.user) {
      try {
        await this.settingsService.updateThemeColor(this.user.uid, this.selectedThemeColor);
        // Update CSS custom properties for immediate effect
        document.documentElement.style.setProperty('--theme-color', this.selectedThemeColor);

        // Set text color based on theme brightness
        const textColor = this.getTextColorForTheme(this.selectedThemeColor);
        document.documentElement.style.setProperty('--header-text-color', textColor);
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
    if (data && data.deleted) {
      // If character was deleted, clear selection if it was the selected character
      if (this.selectedCharacterId === character.id) {
        this.selectedCharacterId = null;
      }

      // Log warning if deletion was incomplete
      if (data.warning) {
        console.warn('Character deletion completed with warnings - some associated data may still exist');
      }
    }
  }

  logout(): void {
    this.authService.logout().then(() => {
      this.router.navigate(['/login']);
    });
  }

  startGame(): void {
    if (this.selectedCharacterId) {
      // Navigate to game screen
      this.router.navigate(['/game']);
    }
  }
}
