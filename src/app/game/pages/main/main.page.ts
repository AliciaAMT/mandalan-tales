import { Component, OnInit, inject, effect, ViewChild, ElementRef, AfterViewInit, OnDestroy, NgZone, ChangeDetectorRef } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CharacterService } from '../../../game/services/character.service';
import { CharStats } from '../../../game/models/charstats.model';
import { SettingsService } from '../../../game/services/settings.service';
import { AuthService } from '../../../services/auth.service';
import { DEFAULT_THEME_COLOR } from '../../../game/models/settings.model';
import { IonicModule } from '@ionic/angular';
import { FocusManagerDirective } from '../../../shared/focus-manager.directive';

const STORAGE_KEY = 'mainPageSectionState';

interface MapTile {
  x: number;
  y: number;
  imageSrc: string;
  isPlayer: boolean;
  isClickable: boolean;
  action?: string;
}

interface NPC {
  name: string;
  portrait: string;
  description?: string;
  action: string;
}

interface GameObject {
  name: string;
  image: string;
  description?: string;
  action: string;
}

interface Portal {
  name: string;
  image: string;
  destination: string;
  description?: string;
  action: string;
}

@Component({
  selector: 'app-main',
  templateUrl: './main.page.html',
  styleUrls: ['./main.page.scss'],
  standalone: true,
  imports: [CommonModule, FormsModule, IonicModule, FocusManagerDirective]
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
  isInitialized = false;

  @ViewChild('mapGrid') mapGridRef!: ElementRef<HTMLDivElement>;

  private mapParentResizeObserver: ResizeObserver | null = null;
  private resizeTimeout: any = null;

  constructor(
    private ngZone: NgZone,
    private cdr: ChangeDetectorRef
  ) {
    // Watch for character changes and regenerate map
    effect(() => {
      const chars = this.characterService.getCharacters();
      if (chars.length > 0 && this.isInitialized) {
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
    this.isInitialized = true;
  }

  ngAfterViewInit() {
    // Use a longer delay to ensure DOM is fully rendered and Ionic components are initialized
    setTimeout(() => {
      this.ngZone.runOutsideAngular(() => {
        this.resizeMapGrid();
      });
    }, 100);

    // Add a second attempt with longer delay for Ionic Content
    setTimeout(() => {
      this.ngZone.runOutsideAngular(() => {
        this.resizeMapGrid();
      });
    }, 500);

    window.addEventListener('resize', this.onResize);

    // Set up ResizeObserver on the map's parent with proper null checks
    setTimeout(() => {
      if (this.mapGridRef?.nativeElement?.parentElement) {
        this.mapParentResizeObserver = new ResizeObserver(() => {
          this.ngZone.runOutsideAngular(() => {
            this.resizeMapGrid();
          });
        });
        this.mapParentResizeObserver.observe(this.mapGridRef.nativeElement.parentElement);
      }
    }, 200);

    // Additional attempt to handle Ionic Content initialization
    setTimeout(() => {
      this.ngZone.run(() => {
        this.cdr.detectChanges();
        setTimeout(() => {
          this.ngZone.runOutsideAngular(() => {
            this.resizeMapGrid();
          });
        }, 100);
      });
    }, 1000);
  }

  ngOnDestroy() {
    window.removeEventListener('resize', this.onResize);
    if (this.mapParentResizeObserver) {
      this.mapParentResizeObserver.disconnect();
      this.mapParentResizeObserver = null;
    }
    if (this.resizeTimeout) {
      clearTimeout(this.resizeTimeout);
    }
  }

  onResize = () => {
    // Debounce resize events
    if (this.resizeTimeout) {
      clearTimeout(this.resizeTimeout);
    }
    this.resizeTimeout = setTimeout(() => {
      this.ngZone.runOutsideAngular(() => {
        this.resizeMapGrid();
      });
    }, 100);
  };

  resizeMapGrid() {
    if (!this.mapGridRef?.nativeElement) {
      console.warn('Map grid element not found');
      return;
    }

    const parent = this.mapGridRef.nativeElement.parentElement;
    if (!parent) {
      console.warn('Map grid parent element not found');
      return;
    }

    try {
      const rect = parent.getBoundingClientRect();
      const { width, height } = rect;

      if (width > 0 && height > 0) {
        const size = Math.floor(Math.min(width, height));
        this.mapGridRef.nativeElement.style.width = size + 'px';
        this.mapGridRef.nativeElement.style.height = size + 'px';
      } else {
        console.warn('Parent element has zero dimensions:', { width, height });
        // Fallback to a reasonable size
        this.mapGridRef.nativeElement.style.width = '300px';
        this.mapGridRef.nativeElement.style.height = '300px';
      }
    } catch (error) {
      console.warn('Error resizing map grid:', error);
      // Fallback to a reasonable size
      try {
        this.mapGridRef.nativeElement.style.width = '300px';
        this.mapGridRef.nativeElement.style.height = '300px';
      } catch (fallbackError) {
        console.error('Failed to set fallback size:', fallbackError);
      }
    }
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
      return 'Your current position';
    }
    return `Map tile at coordinates (${tile.x}, ${tile.y})`;
  }

  onTileImageError(event: any, tile: MapTile) {
    try {
      console.warn(`Failed to load tile image at (${tile.x}, ${tile.y})`);
      if (event?.target) {
        event.target.style.display = 'none';
      }
    } catch (error) {
      console.warn('Error handling tile image error:', error);
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

  private pollResizeMapGrid(times = 7, interval = 30) {
    let count = 0;
    const poll = () => {
      this.resizeMapGrid();
      count++;
      if (count < times) {
        setTimeout(poll, interval);
      }
    };
    poll();
  }

  togglePlayerStats() {
    this.isPlayerStatsOpen = !this.isPlayerStatsOpen;
    this.saveState();
    this.pollResizeMapGrid();
  }
  toggleMap() {
    this.isMapOpen = !this.isMapOpen;
    this.saveState();
    this.pollResizeMapGrid();
  }
  toggleTileActions() {
    this.isTileActionsOpen = !this.isTileActionsOpen;
    this.saveState();
    this.pollResizeMapGrid();
  }
  toggleMenu() {
    this.isMenuOpen = !this.isMenuOpen;
    this.saveState();
    this.pollResizeMapGrid();
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

  // Tile Actions Methods
  getCurrentNPCs(): NPC[] {
    if (!this.currentCharacter) return [];

    const { map, xaxis, yaxis } = this.currentCharacter;
    const npcs: NPC[] = [];

    // Father in homeup (2,2)
    if (map === 'homeup' && xaxis === 2 && yaxis === 2) {
      npcs.push({
        name: 'Father',
        portrait: 'father',
        description: 'Your father, a wise and caring man.',
        action: 'talk'
      });
    }

    // Marah in marah house (1,2) - assuming this is her location
    if (map === 'marah' && xaxis === 1 && yaxis === 2) {
      npcs.push({
        name: 'Marah',
        portrait: 'marah',
        description: 'Lady Marah, a mysterious woman.',
        action: 'talk'
      });
    }

    // Random rat in home (2,2) - 30% chance
    if (map === 'home' && xaxis === 2 && yaxis === 2) {
      if (Math.random() < 0.3) {
        npcs.push({
          name: 'Rat',
          portrait: 'default', // Will use a fallback image
          description: 'A small rat scurrying about.',
          action: 'fight'
        });
      }
    }

    return npcs;
  }

  getCurrentObjects(): GameObject[] {
    if (!this.currentCharacter) return [];

    const { map, xaxis, yaxis } = this.currentCharacter;
    const objects: GameObject[] = [];

    // Homeup objects
    if (map === 'homeup') {
      if (xaxis === 2 && yaxis === 2) {
        objects.push({
          name: 'Rug',
          image: 'rug',
          description: 'A comfortable rug on the floor.',
          action: 'examine'
        });
      }
      if (xaxis === 2 && yaxis === 1) {
        objects.push({
          name: 'Water Barrel',
          image: 'waterbarrel',
          description: 'A barrel filled with fresh water.',
          action: 'drink'
        });
      }
      if (xaxis === 3 && yaxis === 1) {
        objects.push({
          name: 'Wardrobe',
          image: 'wardrobe',
          description: 'A wooden wardrobe for storing clothes.',
          action: 'search'
        });
      }
      if (xaxis === 3 && yaxis === 2) {
        objects.push({
          name: 'Desk',
          image: 'desk',
          description: 'A sturdy wooden desk.',
          action: 'examine'
        });
      }
      if (xaxis === 1 && yaxis === 2) {
        objects.push({
          name: 'Coatrack',
          image: 'coatrack',
          description: 'A rack for hanging coats and hats.',
          action: 'examine'
        });
      }
      if (xaxis === 1 && yaxis === 3) {
        objects.push({
          name: 'Bed',
          image: 'bed',
          description: 'A comfortable bed for resting.',
          action: 'sleep'
        });
      }
      if (xaxis === 2 && yaxis === 3) {
        objects.push({
          name: 'Chest',
          image: 'chest',
          description: 'A wooden chest for storing items.',
          action: 'search'
        });
      }
      if (xaxis === 3 && yaxis === 3) {
        objects.push({
          name: 'Shelf',
          image: 'shelf',
          description: 'A shelf with various items.',
          action: 'examine'
        });
      }
    }

    // Home objects
    if (map === 'home') {
      if (xaxis === 1 && yaxis === 1) {
        objects.push({
          name: 'Shelf',
          image: 'shelf1',
          description: 'A wooden shelf with various items.',
          action: 'examine'
        });
      }
      if (xaxis === 2 && yaxis === 1) {
        objects.push({
          name: 'Rug',
          image: 'carpet1',
          description: 'A decorative rug on the floor.',
          action: 'examine'
        });
      }
      if (xaxis === 3 && yaxis === 1) {
        objects.push({
          name: 'Chest',
          image: 'chest1',
          description: 'A sturdy wooden chest.',
          action: 'search'
        });
      }
      if (xaxis === 3 && yaxis === 2) {
        objects.push({
          name: 'Fireplace',
          image: 'fireplace',
          description: 'A warm fireplace providing heat.',
          action: 'warm'
        });
      }
      if (xaxis === 2 && yaxis === 2) {
        objects.push({
          name: 'Table',
          image: 'table',
          description: 'A wooden table for meals.',
          action: 'examine'
        });
      }
      if (xaxis === 1 && yaxis === 2) {
        objects.push({
          name: 'Shelf',
          image: 'shelf2',
          description: 'Another wooden shelf.',
          action: 'examine'
        });
      }
      if (xaxis === 1 && yaxis === 3) {
        objects.push({
          name: 'Pantry',
          image: 'wardrobe',
          description: 'A pantry for storing food.',
          action: 'search'
        });
      }
      if (xaxis === 2 && yaxis === 3) {
        objects.push({
          name: 'Herb Rack',
          image: 'herbrack',
          description: 'A rack for drying herbs.',
          action: 'examine'
        });
      }
      if (xaxis === 3 && yaxis === 3) {
        objects.push({
          name: 'Side Table',
          image: 'sidetable',
          description: 'A small side table.',
          action: 'examine'
        });
      }
    }

    // Yard objects
    if (map === 'yard') {
      if (xaxis === 3 && yaxis === 3) {
        objects.push({
          name: 'Dog House',
          image: 'doghouse',
          description: 'A small house for the family dog.',
          action: 'examine'
        });
      }
      if (xaxis === 2 && yaxis === 2) {
        objects.push({
          name: 'Well',
          image: 'well',
          description: 'A deep well for drawing water.',
          action: 'drink'
        });
      }
      if (xaxis === 1 && yaxis === 2) {
        objects.push({
          name: 'Melon Plants',
          image: 'pumpkinplant',
          description: 'Growing melon plants in the garden.',
          action: 'harvest'
        });
      }
      if (xaxis === 3 && yaxis === 2) {
        objects.push({
          name: 'Chicken Coop',
          image: 'chicken',
          description: 'A coop housing chickens.',
          action: 'examine'
        });
      }
      if (xaxis === 2 && yaxis === 1) {
        objects.push({
          name: 'Garden',
          image: 'plants',
          description: 'A small vegetable garden.',
          action: 'harvest'
        });
      }
      if (xaxis === 3 && yaxis === 1) {
        objects.push({
          name: 'Fruit Tree',
          image: 'fruittree',
          description: 'A tree bearing delicious fruit.',
          action: 'harvest'
        });
      }
    }

    return objects;
  }

  getCurrentPortals(): Portal[] {
    if (!this.currentCharacter) return [];

    const { map, xaxis, yaxis } = this.currentCharacter;
    const portals: Portal[] = [];

    // Homeup portals
    if (map === 'homeup' && xaxis === 1 && yaxis === 1) {
      portals.push({
        name: 'Stairs Down',
        image: 'stairsdown',
        destination: 'home',
        description: 'Stairs leading down to the main floor.',
        action: 'descend'
      });
    }

    // Home portals
    if (map === 'home') {
      if (xaxis === 1 && yaxis === 1) {
        portals.push({
          name: 'Stairs Up',
          image: 'stairsdown', // Reusing stairs image
          destination: 'homeup',
          description: 'Stairs leading up to the bedroom.',
          action: 'ascend'
        });
      }
      if (xaxis === 3 && yaxis === 3) {
        portals.push({
          name: 'Front Door',
          image: 'door',
          destination: 'yard',
          description: 'The front door leading outside.',
          action: 'exit'
        });
      }
      if (xaxis === 2 && yaxis === 1) {
        portals.push({
          name: 'Back Door',
          image: 'door',
          destination: 'yard',
          description: 'The back door leading to the yard.',
          action: 'exit'
        });
      }
    }

    // Yard portals
    if (map === 'yard') {
      if (xaxis === 2 && yaxis === 3) {
        portals.push({
          name: 'Back Door',
          image: 'door',
          destination: 'home',
          description: 'The back door leading into the house.',
          action: 'enter'
        });
      }
      if (xaxis === 1 && yaxis === 3) {
        portals.push({
          name: 'Cellar Door',
          image: 'cellar',
          destination: 'cellar',
          description: 'A door leading down to the cellar.',
          action: 'descend'
        });
      }
      if (xaxis === 1 && yaxis === 1) {
        portals.push({
          name: 'Barn Door',
          image: 'barn',
          destination: 'barn',
          description: 'A door leading to the barn.',
          action: 'enter'
        });
      }
    }

    return portals;
  }

  // Interaction methods
  interactWithNPC(npc: NPC) {
    console.log(`Interacting with ${npc.name}: ${npc.action}`);
    // TODO: Implement NPC interaction logic
    alert(`You interact with ${npc.name}. This feature is coming soon!`);
  }

  interactWithObject(object: GameObject) {
    console.log(`Interacting with ${object.name}: ${object.action}`);
    // TODO: Implement object interaction logic
    alert(`You ${object.action} the ${object.name}. This feature is coming soon!`);
  }

  usePortal(portal: Portal) {
    console.log(`Using portal to ${portal.destination}: ${portal.action}`);
    // TODO: Implement portal logic
    alert(`You ${portal.action} to ${portal.destination}. This feature is coming soon!`);
  }

  // Error handling for images
  onPortraitError(event: any, npc: NPC) {
    try {
      console.warn(`Failed to load portrait for ${npc.name}`);
      if (event?.target) {
        event.target.style.display = 'none';
      }
    } catch (error) {
      console.warn('Error handling portrait error:', error);
    }
  }

  onObjectImageError(event: any, object: GameObject) {
    try {
      console.warn(`Failed to load image for ${object.name}`);
      if (event?.target) {
        event.target.style.display = 'none';
      }
    } catch (error) {
      console.warn('Error handling object image error:', error);
    }
  }

  onPortalImageError(event: any, portal: Portal) {
    try {
      console.warn(`Failed to load image for ${portal.name}`);
      if (event?.target) {
        event.target.style.display = 'none';
      }
    } catch (error) {
      console.warn('Error handling portal image error:', error);
    }
  }

  getAllTileActions(): Array<any> {
    const npcs = this.getCurrentNPCs().map(npc => ({ ...npc, type: 'NPC' }));
    const objects = this.getCurrentObjects().map(obj => ({ ...obj, type: 'Object' }));
    const portals = this.getCurrentPortals().map(portal => ({ ...portal, type: 'Portal' }));
    return [...npcs, ...objects, ...portals];
  }
}
