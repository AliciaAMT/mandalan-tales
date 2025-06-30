import { Component, OnInit, inject, effect, ViewChild, ElementRef, AfterViewInit, OnDestroy, NgZone } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CharacterService } from '../../../game/services/character.service';
import { CharStats } from '../../../game/models/charstats.model';
import { SettingsService } from '../../../game/services/settings.service';
import { AuthService } from '../../../services/auth.service';
import { DEFAULT_THEME_COLOR } from '../../../game/models/settings.model';

const STORAGE_KEY = 'mainPageSectionState';

interface MapTile {
  x: number;
  y: number;
  imageSrc: string;
  isPlayer: boolean;
  isClickable: boolean;
  action?: string;
}

@Component({
  selector: 'app-main',
  templateUrl: './main.page.html',
  styleUrls: ['./main.page.scss'],
  standalone: true,
  imports: [CommonModule, FormsModule]
})
export class MainPage implements OnInit, AfterViewInit, OnDestroy {
  isPlayerStatsOpen = true;
  isMapOpen = true;
  isTileActionsOpen = true;
  isMenuOpen = true;

  characterService = inject(CharacterService);
  settingsService = inject(SettingsService);
  authService = inject(AuthService);

  mapTiles: MapTile[][] = [];

  @ViewChild('mapGrid') mapGridRef!: ElementRef<HTMLDivElement>;

  constructor(private ngZone: NgZone) {
    // Watch for character changes and regenerate map
    effect(() => {
      const chars = this.characterService.getCharacters();
      if (chars.length > 0) {
        this.generateMap();
      }
    });
  }

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

    // Generate initial map
    this.generateMap();
  }

  ngAfterViewInit() {
    this.resizeMapGrid();
    window.addEventListener('resize', this.onResize);
  }

  ngOnDestroy() {
    window.removeEventListener('resize', this.onResize);
  }

  onResize = () => {
    this.ngZone.runOutsideAngular(() => {
      this.resizeMapGrid();
    });
  };

  resizeMapGrid() {
    if (!this.mapGridRef) return;
    const parent = this.mapGridRef.nativeElement.parentElement;
    if (!parent) return;
    const { width, height } = parent.getBoundingClientRect();
    const size = Math.floor(Math.min(width, height));
    this.mapGridRef.nativeElement.style.width = size + 'px';
    this.mapGridRef.nativeElement.style.height = size + 'px';
  }

  generateMap() {
    if (!this.currentCharacter) {
      return;
    }

    const char = this.currentCharacter;

    const mapTiles: MapTile[][] = [];

    // Generate 3x3 grid around player position
    for (let row = 0; row < 3; row++) {
      const tileRow: MapTile[] = [];
      for (let col = 0; col < 3; col++) {
        const tileX = char.xaxis - 1 + col;
        const tileY = char.yaxis + 1 - row; // Invert Y axis for display

        const isPlayer = (row === 1 && col === 1);
        const imageSrc = this.getTileImageSrc(char.map, tileX, tileY, isPlayer);
        const isClickable = this.isTileClickable(char, tileX, tileY);
        const action = this.getTileAction(char, tileX, tileY);

        const tile = {
          x: tileX,
          y: tileY,
          imageSrc,
          isPlayer,
          isClickable,
          action
        };

        tileRow.push(tile);
      }
      mapTiles.push(tileRow);
    }

    this.mapTiles = mapTiles;
  }

  // Test method to generate hardcoded tiles
  generateTestMap() {
    this.mapTiles = [
      [
        { x: 1, y: 3, imageSrc: 'assets/webp-output/map-tiles/yard13.webp', isPlayer: false, isClickable: false },
        { x: 2, y: 3, imageSrc: 'assets/webp-output/map-tiles/yard23.webp', isPlayer: false, isClickable: true, action: 'movenorth' },
        { x: 3, y: 3, imageSrc: 'assets/webp-output/map-tiles/yard33.webp', isPlayer: false, isClickable: false }
      ],
      [
        { x: 1, y: 2, imageSrc: 'assets/webp-output/map-tiles/yard12.webp', isPlayer: false, isClickable: true, action: 'movewest' },
        { x: 2, y: 2, imageSrc: 'assets/webp-output/map-tiles/yard22s.webp', isPlayer: true, isClickable: false },
        { x: 3, y: 2, imageSrc: 'assets/webp-output/map-tiles/yard32.webp', isPlayer: false, isClickable: true, action: 'moveeast' }
      ],
      [
        { x: 1, y: 1, imageSrc: 'assets/webp-output/map-tiles/yard11.webp', isPlayer: false, isClickable: false },
        { x: 2, y: 1, imageSrc: 'assets/webp-output/map-tiles/yard21.webp', isPlayer: false, isClickable: true, action: 'movesouth' },
        { x: 3, y: 1, imageSrc: 'assets/webp-output/map-tiles/yard31.webp', isPlayer: false, isClickable: false }
      ]
    ];
  }

  private getTileImageSrc(mapName: string, x: number, y: number, isPlayer: boolean): string {
    // For player position, use the 's' suffix
    const suffix = isPlayer ? 's' : '';
    // Use the correct directory for homeup tiles
    if (mapName === 'homeup') {
      return `assets/map-tiles/${mapName}${x}${y}${suffix}.png`;
    }
    // Default to webp-output for other maps
    return `assets/webp-output/map-tiles/${mapName}${x}${y}${suffix}.webp`;
  }

  private isValidTile(mapName: string, x: number, y: number): boolean {
    if (!this.currentCharacter) return false;

    const char = this.currentCharacter;
    const mapDimensions = char.mapdimensions;

    // Map-specific bounds (now with correct lower bounds)
    switch (mapDimensions) {
      case 33: // 3x3 map
        return x >= 1 && x <= 3 && y >= 1 && y <= 3;
      case 44: // 4x4 map (yard)
        return x >= 1 && x <= 4 && y >= 1 && y <= 4;
      case 77: // 7x7 map
        return x >= 1 && x <= 7 && y >= 1 && y <= 7;
      default:
        return true; // Allow for now, will be refined
    }
  }

  private isTileClickable(char: CharStats, x: number, y: number): boolean {
    // Check if tile is adjacent to player
    const isAdjacent = Math.abs(x - char.xaxis) <= 1 && Math.abs(y - char.yaxis) <= 1;

    // Check if tile is valid and not the player's current position
    return isAdjacent && this.isValidTile(char.map, x, y) && !(x === char.xaxis && y === char.yaxis);
  }

  private getTileAction(char: CharStats, x: number, y: number): string | undefined {
    if (!this.isTileClickable(char, x, y)) return undefined;

    // Determine movement direction
    if (x === char.xaxis - 1 && y === char.yaxis) return 'movewest';
    if (x === char.xaxis + 1 && y === char.yaxis) return 'moveeast';
    if (x === char.xaxis && y === char.yaxis + 1) return 'movenorth';
    if (x === char.xaxis && y === char.yaxis - 1) return 'movesouth';

    // Check for special locations that might trigger events
    // This would be expanded based on the old game logic
    return 'explore';
  }

  onTileClick(tile: MapTile) {
    if (!tile.isClickable || !tile.action) return;

    // Handle different actions
    switch (tile.action) {
      case 'movewest':
      case 'moveeast':
      case 'movenorth':
      case 'movesouth':
        this.movePlayer(tile.action);
        break;
      case 'explore':
        this.exploreTile(tile);
        break;
      default:
        console.log('Unknown action:', tile.action);
    }
  }

  private movePlayer(direction: string) {
    if (!this.currentCharacter) return;

    const char = this.currentCharacter;
    let newX = char.xaxis;
    let newY = char.yaxis;

    switch (direction) {
      case 'movewest':
        newX = char.xaxis - 1;
        break;
      case 'moveeast':
        newX = char.xaxis + 1;
        break;
      case 'movenorth':
        newY = char.yaxis + 1;
        break;
      case 'movesouth':
        newY = char.yaxis - 1;
        break;
    }

    // Validate movement
    if (this.isValidTile(char.map, newX, newY)) {
      // Update character position
      char.xaxis = newX;
      char.yaxis = newY;

      // Save to service
      this.characterService.updateCharacter(char.id!, {
        xaxis: newX,
        yaxis: newY
      });

      // Regenerate map
      this.generateMap();
    }
  }

  private exploreTile(tile: MapTile) {
    // This would trigger events, encounters, etc.
    // For now, just log the action
  }

  getTileAriaLabel(tile: MapTile): string {
    if (tile.isPlayer) {
      return `Your current position at coordinates (${tile.x}, ${tile.y})`;
    }
    if (tile.isClickable) {
      return `Clickable tile at (${tile.x}, ${tile.y}) - ${tile.action}`;
    }
    return `Map tile at coordinates (${tile.x}, ${tile.y})`;
  }

  getTileAltText(tile: MapTile): string {
    if (tile.isPlayer) {
      return `Player position at (${tile.x}, ${tile.y})`;
    }
    return `Map tile at (${tile.x}, ${tile.y})`;
  }

  onTileImageError(event: any, tile: MapTile) {
    // Set a fallback image - try yard00.webp first, then a generic fallback
    if (tile.imageSrc.includes('yard00.webp')) {
      // If yard00.webp also fails, use a data URL for a simple colored square
      event.target.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iIzMzMzMzMyIvPjx0ZXh0IHg9IjUwIiB5PSI1MCIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjEyIiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkVycm9yPC90ZXh0Pjwvc3ZnPg==';
    } else {
      event.target.src = 'assets/webp-output/map-tiles/yard00.webp';
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

  togglePlayerStats() {
    this.isPlayerStatsOpen = !this.isPlayerStatsOpen;
    this.saveState();
    requestAnimationFrame(() => this.resizeMapGrid());
  }
  toggleMap() {
    this.isMapOpen = !this.isMapOpen;
    this.saveState();
    requestAnimationFrame(() => this.resizeMapGrid());
  }
  toggleTileActions() {
    this.isTileActionsOpen = !this.isTileActionsOpen;
    this.saveState();
    requestAnimationFrame(() => this.resizeMapGrid());
  }
  toggleMenu() {
    this.isMenuOpen = !this.isMenuOpen;
    this.saveState();
    requestAnimationFrame(() => this.resizeMapGrid());
  }

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

  get currentCharacter(): CharStats | undefined {
    const chars = this.characterService.getCharacters();
    return chars.length > 0 ? chars[0] : undefined;
  }
}
