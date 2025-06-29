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
}
