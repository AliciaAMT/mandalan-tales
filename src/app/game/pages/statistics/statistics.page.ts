import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { Router, RouterModule } from '@angular/router';
import { CharacterService } from '../../services/character.service';
import { CharStats } from '../../models/charstats.model';
import { AuthService } from '../../../services/auth.service';
import { SettingsService } from '../../services/settings.service';
import { DEFAULT_THEME_COLOR } from '../../models/settings.model';
import { FocusManagerDirective } from '../../../shared/focus-manager.directive';

@Component({
  selector: 'app-statistics',
  standalone: true,
  imports: [CommonModule, IonicModule, RouterModule, FocusManagerDirective],
  templateUrl: './statistics.page.html',
  styleUrls: ['./statistics.page.scss']
})
export class StatisticsPage implements OnInit {
  private characterService = inject(CharacterService);
  private authService = inject(AuthService);
  private settingsService = inject(SettingsService);
  private router = inject(Router);

  currentCharacter: CharStats | undefined;
  isLoading = true;

  // Pre-computed arrays to prevent infinite loops
  mainStats: Array<{name: string, value: number}> = [];
  skills: Array<{name: string, value: number}> = [];
  resistances: Array<{name: string, value: number}> = [];

  ngOnInit() {
    console.log('StatisticsPage ngOnInit called');
    this.loadCurrentCharacter();
    this.loadUserSettings();
  }

  ionViewWillEnter() {
    console.log('StatisticsPage ionViewWillEnter called');
    // Load user settings to apply the correct theme
    this.loadUserSettings();
  }

  private async loadUserSettings(): Promise<void> {
    const user = this.authService.getCurrentUser();
    if (user) {
      const settings = await this.settingsService.getUserSettings(user.uid);
      if (settings) {
        // Apply theme color to CSS custom properties
        document.documentElement.style.setProperty('--theme-color', settings.themeColor);
        document.documentElement.style.setProperty('--ion-color-primary', settings.themeColor);

        // Set text color based on theme brightness
        const textColor = this.getTextColorForTheme(settings.themeColor);
        document.documentElement.style.setProperty('--header-text-color', textColor);
      } else {
        // Apply default theme color
        document.documentElement.style.setProperty('--theme-color', DEFAULT_THEME_COLOR);
        document.documentElement.style.setProperty('--ion-color-primary', DEFAULT_THEME_COLOR);
        document.documentElement.style.setProperty('--header-text-color', '#181200');
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

  private loadCurrentCharacter() {
    console.log('StatisticsPage loadCurrentCharacter called');
    try {
      const characters = this.characterService.getCharacters();
      console.log('Characters loaded:', characters);
      if (characters.length > 0) {
        this.currentCharacter = characters[0];
        console.log('Current character set:', this.currentCharacter);
        // Compute stats arrays once
        this.computeStatsArrays();
      } else {
        console.log('No characters found');
      }
    } catch (error) {
      console.error('Error loading characters:', error);
    }
    this.isLoading = false;
    console.log('StatisticsPage loadCurrentCharacter completed');
  }

  private computeStatsArrays() {
    if (!this.currentCharacter) return;

    // Compute main stats
    this.mainStats = [
      { name: 'Armor', value: this.currentCharacter.defense || 0 },
      { name: 'Damage', value: this.currentCharacter.damage || 0 },
      { name: 'Critical', value: this.currentCharacter.critical || 0 },
      { name: 'Speed', value: this.currentCharacter.speed || 0 },
      { name: 'Accuracy', value: this.currentCharacter.accuracy || 0 },
      { name: 'Strength', value: this.currentCharacter.strength || 0 },
      { name: 'Agility', value: this.currentCharacter.agility || 0 },
      { name: 'Wisdom', value: this.currentCharacter.wisdom || 0 },
      { name: 'Luck', value: this.currentCharacter.luck || 0 },
      { name: 'Wins', value: this.currentCharacter.wins || 0 },
      { name: 'Deaths', value: this.currentCharacter.deaths || 0 }
    ];

    // Compute skills
    this.skills = [
      { name: 'Magic Find', value: this.currentCharacter.magicFind || 0 },
      { name: 'Lockpicking', value: this.currentCharacter.lockpicking || 0 },
      { name: 'Cooking', value: this.currentCharacter.cooking || 0 },
      { name: 'Alchemy', value: this.currentCharacter.alchemy || 0 },
      { name: 'Enchanting', value: this.currentCharacter.enchanting || 0 }
    ];

    // Compute resistances
    this.resistances = [
      { name: 'Fire', value: this.currentCharacter.fireResist || 0 },
      { name: 'Water', value: this.currentCharacter.iceResist || 0 },
      { name: 'Air', value: this.currentCharacter.airResist || 0 },
      { name: 'Earth', value: this.currentCharacter.earthResist || 0 },
      { name: 'Dark Magic', value: this.currentCharacter.darkResist || 0 },
      { name: 'Poison', value: this.currentCharacter.poisonResist || 0 },
      { name: 'Immobilize', value: this.currentCharacter.immobilizeResist || 0 },
      { name: 'Mind', value: this.currentCharacter.mindResist || 0 }
    ];

    console.log('Stats arrays computed:', {
      mainStats: this.mainStats.length,
      skills: this.skills.length,
      resistances: this.resistances.length
    });
  }

  goBack() {
    console.log('StatisticsPage goBack called');
    this.router.navigate(['/game']);
  }

  getStatColor(value: number, maxValue: number = 20): string {
    const percentage = value / maxValue;
    if (percentage >= 0.8) return '#4caf50'; // Green for high stats
    if (percentage >= 0.6) return '#ff9800'; // Orange for medium stats
    return '#f44336'; // Red for low stats
  }

  getResistanceColor(value: number): string {
    if (value >= 8) return '#4caf50'; // Green for high resistance
    if (value >= 5) return '#ff9800'; // Orange for medium resistance
    return '#f44336'; // Red for low resistance
  }

  getSkillColor(value: number): string {
    if (value >= 20) return '#4caf50'; // Green for high skills
    if (value >= 10) return '#ff9800'; // Orange for medium skills
    return '#f44336'; // Red for low skills
  }

  onPortraitError(event: Event) {
    const target = event.target as HTMLImageElement;
    if (target) {
      target.style.display = 'none';
    }
  }
}
