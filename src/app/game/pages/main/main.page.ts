import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

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

  constructor() { }

  ngOnInit() {
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
