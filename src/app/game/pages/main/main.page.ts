import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

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

  ngOnInit() {}

  togglePlayerStats() { this.isPlayerStatsOpen = !this.isPlayerStatsOpen; }
  toggleMap() { this.isMapOpen = !this.isMapOpen; }
  toggleTileActions() { this.isTileActionsOpen = !this.isTileActionsOpen; }
  toggleMenu() { this.isMenuOpen = !this.isMenuOpen; }

  get gridTemplateRows() {
    // If menu is open, bottom row is 1fr, else just header (auto)
    return this.isMenuOpen ? '3fr 1fr' : '1fr auto';
  }
  get gridTemplateColumns() {
    // Only include columns for open sections
    const cols = [];
    if (this.isPlayerStatsOpen) cols.push('1fr');
    if (this.isMapOpen) cols.push('2fr');
    if (this.isTileActionsOpen) cols.push('1fr');
    // Always at least one column so menu can fill
    return cols.length ? cols.join(' ') : '1fr';
  }

  get gridTemplateAreas() {
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
