import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CharacterService } from '../../../game/services/character.service';
import { CharStats } from '../../../game/models/charstats.model';
import { SettingsService } from '../../../game/services/settings.service';
import { AuthService } from '../../../services/auth.service';
import { DEFAULT_THEME_COLOR } from '../../../game/models/settings.model';

const STORAGE_KEY = 'mainPageSectionState';

@Component({
  selector: 'app-main',
  templateUrl: './main.page.html',
  styleUrls: ['./main.page.scss'],
  standalone: true,
  imports: [CommonModule, FormsModule]
})
export class MainPage implements OnInit {
  isPlayerStatsOpen = true;
  isMapOpen = true;
  isTileActionsOpen = true;
  isMenuOpen = true;

  characterService = inject(CharacterService);
  settingsService = inject(SettingsService);
  authService = inject(AuthService);

  get currentCharacter(): CharStats | undefined {
    const chars = this.characterService.getCharacters();
    return chars.length > 0 ? chars[0] : undefined;
  }

  constructor() { }

  async ngOnInit() {
    await this.loadUserSettings();
    const saved = localStorage.getItem(STORAGE_KEY);
    if (saved) {
      try {
        const state = JSON.parse(saved);
        if (typeof state.isPlayerStatsOpen === 'boolean') this.isPlayerStatsOpen = state.isPlayerStatsOpen;
        if (typeof state.isMapOpen === 'boolean') this.isMapOpen = state.isMapOpen;
        if (typeof state.isTileActionsOpen === 'boolean') this.isTileActionsOpen = state.isTileActionsOpen;
        if (typeof state.isMenuOpen === 'boolean') this.isMenuOpen = state.isMenuOpen;
      } catch {}
    }
  }

  async loadUserSettings(): Promise<void> {
    const user = this.authService.getCurrentUser();
    if (user) {
      const settings = await this.settingsService.getUserSettings(user.uid);
      if (settings) {
        // Apply theme color to CSS custom property
        document.documentElement.style.setProperty('--theme-color', settings.themeColor);

        // Set text color based on theme brightness
        const textColor = this.getTextColorForTheme(settings.themeColor);
        document.documentElement.style.setProperty('--header-text-color', textColor);
      } else {
        // Apply default theme color
        document.documentElement.style.setProperty('--theme-color', DEFAULT_THEME_COLOR);
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

  saveState() {
    localStorage.setItem(STORAGE_KEY, JSON.stringify({
      isPlayerStatsOpen: this.isPlayerStatsOpen,
      isMapOpen: this.isMapOpen,
      isTileActionsOpen: this.isTileActionsOpen,
      isMenuOpen: this.isMenuOpen
    }));
  }

  togglePlayerStats() { this.isPlayerStatsOpen = !this.isPlayerStatsOpen; this.saveState(); }
  toggleMap() { this.isMapOpen = !this.isMapOpen; this.saveState(); }
  toggleTileActions() { this.isTileActionsOpen = !this.isTileActionsOpen; this.saveState(); }
  toggleMenu() { this.isMenuOpen = !this.isMenuOpen; this.saveState(); }

  get isMobile() {
    return window.innerWidth <= 900;
  }

  get gridTemplateRows() {
    if (this.isMobile) {
      // Stack all sections vertically
      return 'auto auto auto auto';
    }
    // If menu is open, bottom row is 1fr, else just header (auto)
    return this.isMenuOpen ? '3fr 1fr' : '1fr auto';
  }
  get gridTemplateColumns() {
    if (this.isMobile) {
      return '1fr';
    }
    // Only include columns for open sections
    const cols = [];
    if (this.isPlayerStatsOpen) cols.push('1fr');
    if (this.isMapOpen) cols.push('2fr');
    if (this.isTileActionsOpen) cols.push('1fr');
    // Always at least one column so menu can fill
    return cols.length ? cols.join(' ') : '1fr';
  }

  get gridTemplateAreas() {
    if (this.isMobile) {
      return 'unset';
    }
    // Build the top row
    let topRow = [];
    if (this.isPlayerStatsOpen) topRow.push('playerstats');
    if (this.isMapOpen) topRow.push('map');
    if (this.isTileActionsOpen) topRow.push('tileactions');
    if (topRow.length === 0) topRow = ['empty'];
    // Menu always spans all columns
    const menuRow = Array(topRow.length).fill('menu').join(' ');
    return `\"${topRow.join(' ')}\" \"${menuRow}\"`;
  }

  get playerStatsArea() { return this.isPlayerStatsOpen ? 'playerstats' : ''; }
  get mapArea() { return this.isMapOpen ? 'map' : ''; }
  get tileActionsArea() { return this.isTileActionsOpen ? 'tileactions' : ''; }
  get menuArea() {
    // Always set menu area to 'menu' so it spans all columns
    return 'menu';
  }
}
