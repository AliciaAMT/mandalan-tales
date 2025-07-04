import { Component, OnInit, inject, effect, ViewChild, ElementRef, AfterViewInit, OnDestroy, NgZone, ChangeDetectorRef, HostListener, Injector, runInInjectionContext } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CharacterService } from '../../../game/services/character.service';
import { CharStats } from '../../../game/models/charstats.model';
import { SettingsService } from '../../../game/services/settings.service';
import { AuthService } from '../../../services/auth.service';
import { InventoryService } from '../../../game/services/inventory.service';
import { DEFAULT_THEME_COLOR } from '../../../game/models/settings.model';
import { IonicModule } from '@ionic/angular';
import { FocusManagerDirective } from '../../../shared/focus-manager.directive';
import { BottomIconRowComponent } from './bottom-icon-row.component';
import { DialogueModalComponent } from '../../components/dialogue-modal/dialogue-modal.component';
import { DialogueService } from '../../services/dialogue.service';
import { ReplenishmentService, ReplenishableItem } from '../../services/replenishment.service';
import { ItemFoundModalComponent, FoundItem } from '../../components/item-found-modal/item-found-modal.component';
import { ModalController } from '@ionic/angular';
// import { ObjectInteractionService } from '../../services/object-interaction.service';
import { TileActionService } from '../../services/tile-action.service';

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
  imports: [CommonModule, FormsModule, IonicModule, FocusManagerDirective, BottomIconRowComponent, DialogueModalComponent]
})
export class MainPage implements OnInit, AfterViewInit, OnDestroy {
  isPlayerStatsOpen = true;
  isMapOpen = true;
  isTileActionsOpen = true;
  isMenuOpen = true;
  isLoading = true;
  private replenishmentInitialized = false;

  characterService = inject(CharacterService);
  settingsService = inject(SettingsService);
  authService = inject(AuthService);
  inventoryService = inject(InventoryService);
  dialogueService = inject(DialogueService);
  replenishmentService = inject(ReplenishmentService);
  // objectInteractionService = inject(ObjectInteractionService);
  tileActionService = inject(TileActionService);
  private injector = inject(Injector);
  modalCtrl = inject(ModalController);

  mapTiles: MapTile[][] = [];
  isInitialized = false;

  @ViewChild('mapGrid') mapGridRef!: ElementRef<HTMLDivElement>;
  @ViewChild('closeInfoBtn') closeInfoBtn!: ElementRef<HTMLButtonElement>;

  private mapParentResizeObserver: ResizeObserver | null = null;
  private resizeTimeout: any = null;

  // Info modal state for mobile
  infoModalOpen = false;
  infoModalAction: any = null;
  private lastFocusedElement: HTMLElement | null = null;

  currentNPCs: NPC[] = [];
  currentObjects: GameObject[] = [];
  currentPortals: Portal[] = [];

  // Track last character position to prevent infinite loops
  private lastCharacterX: number = 0;
  private lastCharacterY: number = 0;

  // Cache for allTileActions to prevent infinite loops
  private _allTileActionsCache: any[] = [];
  private _allTileActionsCacheTimestamp: number = 0;
  private _lastCacheUpdate: number = 0;

  // Cache for getCurrentObjects to prevent infinite loops
  private _lastObjectPosition: string = '';
  private _cachedObjects: GameObject[] = [];

  // Cache for getCurrentNPCs to prevent infinite loops
  private _lastNPCPosition: string = '';
  private _cachedNPCs: NPC[] = [];

  // Cache for getCurrentPortals to prevent infinite loops
  private _lastPortalPosition: string = '';
  private _cachedPortals: Portal[] = [];

  get allTileActions(): any[] {
    // Cache the result to prevent infinite loops
    if (!this._allTileActionsCache || this._allTileActionsCacheTimestamp !== this._lastCacheUpdate) {
      this._allTileActionsCache = this.getAllTileActions();
      this._allTileActionsCacheTimestamp = this._lastCacheUpdate;
    }
    return this._allTileActionsCache;
  }

  constructor(
    private ngZone: NgZone,
    private cdr: ChangeDetectorRef
  ) {
    // Watch for character changes and regenerate map
    effect(() => {
      const chars = this.characterService.getCharacters();
      if (chars.length > 0 && this.isInitialized) {
        // Only regenerate map if character actually changed
        const currentChar = this.currentCharacter;
        if (currentChar && (currentChar.xaxis !== this.lastCharacterX || currentChar.yaxis !== this.lastCharacterY)) {
          this.generateMap();
          this.lastCharacterX = currentChar.xaxis;
          this.lastCharacterY = currentChar.yaxis;
          // Reset replenishment flag when character changes
          this.resetReplenishmentInitialization();
        }
      }
    });
  }

  private resetReplenishmentInitialization() {
    // Reset the flag so replenishment can be initialized for new characters
    this.replenishmentInitialized = false;
  }

  async ngOnInit() {
    console.log('MainPage ngOnInit');

    // Load saved state
    const savedState = localStorage.getItem(STORAGE_KEY);
    if (savedState) {
      try {
        const state = JSON.parse(savedState);
        this.isPlayerStatsOpen = state.isPlayerStatsOpen ?? true;
        this.isMapOpen = state.isMapOpen ?? true;
        this.isTileActionsOpen = state.isTileActionsOpen ?? true;
        this.isMenuOpen = state.isMenuOpen ?? true;
      } catch (error) {
        console.warn('Failed to load saved state:', error);
      }
    }

    // Set theme color from localStorage or default
    const themeColor = localStorage.getItem('themeColor') || DEFAULT_THEME_COLOR;
    document.documentElement.style.setProperty('--theme-color', themeColor);
    if (this.getTextColorForTheme) {
      const textColor = this.getTextColorForTheme(themeColor);
      document.documentElement.style.setProperty('--header-text-color', textColor);
    }
    await this.loadUserSettings();
    console.log('MainPage ngOnInit, currentCharacter:', this.currentCharacter);

        // Load inventory for current character
    await this.inventoryService.loadInventory();
    console.log('Current inventory:', this.inventoryService.inventory);

    // Initialize replenishable items for current character
    if (this.currentCharacter && !this.replenishmentInitialized) {
      await this.replenishmentService.initializeReplenishableItems(this.currentCharacter.name);
      this.replenishmentInitialized = true;
    }

    // Generate initial map
    this.generateMap();
    this.isInitialized = true;
    this.ngZone.run(() => {
      this.isLoading = false;
      this.cdr.detectChanges();
      console.log('isLoading set to', this.isLoading);
    });
  }

  ionViewWillEnter() {
    const themeColor = localStorage.getItem('themeColor') || DEFAULT_THEME_COLOR;
    document.documentElement.style.setProperty('--theme-color', themeColor);
    document.documentElement.style.setProperty('--ion-color-primary', themeColor);
    if (this.getTextColorForTheme) {
      const textColor = this.getTextColorForTheme(themeColor);
      document.documentElement.style.setProperty('--header-text-color', textColor);
    }
  }

  ngAfterViewInit() {
    // Single attempt with proper null checking
    this.initializeMapGrid();

    window.addEventListener('resize', this.onResize);
  }

  private initializeMapGrid() {
    // Check if element exists before proceeding
    if (!this.mapGridRef?.nativeElement) {
      // If element doesn't exist yet, try again after a short delay
    setTimeout(() => {
        this.initializeMapGrid();
    }, 100);
      return;
    }

    // Element exists, proceed with initialization
      this.ngZone.runOutsideAngular(() => {
        this.resizeMapGrid();
      });

    // Set up ResizeObserver on the map's parent with proper null checks
    const parentElement = this.mapGridRef.nativeElement.parentElement;
    if (parentElement) {
        this.mapParentResizeObserver = new ResizeObserver(() => {
          this.ngZone.runOutsideAngular(() => {
            this.resizeMapGrid();
          });
        });
      this.mapParentResizeObserver.observe(parentElement);
      }
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
      // Only resize if the component is still active and element exists
      if (this.mapGridRef?.nativeElement) {
      this.ngZone.runOutsideAngular(() => {
        this.resizeMapGrid();
      });
      }
    }, 100);
  };

  resizeMapGrid() {
    if (!this.mapGridRef?.nativeElement) {
      // Don't log warning for normal initialization timing
      return;
    }

    const parent = this.mapGridRef.nativeElement.parentElement;
    if (!parent) {
      // Don't log warning for normal initialization timing
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
        // Only log warning if dimensions are consistently zero after initialization
        if (this.isInitialized) {
        console.warn('Parent element has zero dimensions:', { width, height });
        }
        // Fallback to a reasonable size
        this.mapGridRef.nativeElement.style.width = '300px';
        this.mapGridRef.nativeElement.style.height = '300px';
      }
    } catch (error) {
      // Only log error if it's not a normal initialization timing issue
      if (this.isInitialized) {
      console.warn('Error resizing map grid:', error);
      }
      // Fallback to a reasonable size
      try {
        this.mapGridRef.nativeElement.style.width = '300px';
        this.mapGridRef.nativeElement.style.height = '300px';
      } catch (fallbackError) {
        if (this.isInitialized) {
        console.error('Failed to set fallback size:', fallbackError);
        }
      }
    }
  }

  generateMap() {
    console.log('generateMap called, currentCharacter:', this.currentCharacter);
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
    this.currentNPCs = this.getCurrentNPCs();
    this.currentObjects = this.getCurrentObjects();
    this.currentPortals = this.getCurrentPortals();

    // Update cache timestamp to invalidate cached tile actions
    this._lastCacheUpdate = Date.now();

    // Clear position-based caches when map is regenerated
    this._lastObjectPosition = '';
    this._lastNPCPosition = '';
    this._lastPortalPosition = '';
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
      return `You are here at position ${tile.x}, ${tile.y}`;
    }
    if (tile.isClickable) {
      return `Move to ${tile.action} at position ${tile.x}, ${tile.y}`;
    }
    return `Map tile at position ${tile.x}, ${tile.y}`;
  }

  getTileAltText(tile: MapTile): string {
    if (tile.isPlayer) {
      return 'Your current position on the map';
    }
    return `Map tile at position ${tile.x}, ${tile.y}`;
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
    // Clear any existing polling
    if (this.resizeTimeout) {
      clearTimeout(this.resizeTimeout);
    }

    let count = 0;
    const poll = () => {
      this.resizeMapGrid();
      count++;
      if (count < times) {
        this.resizeTimeout = setTimeout(poll, interval);
      }
    };
    poll();
  }

  togglePlayerStats() {
    this.isPlayerStatsOpen = !this.isPlayerStatsOpen;
    this.saveState();
    // Use a single resize call instead of polling
    setTimeout(() => this.resizeMapGrid(), 100);
  }

  @HostListener('document:keydown', ['$event'])
  handleHeaderKeydown(event: KeyboardEvent) {
    // Handle Enter and Space for collapsible headers
    if (event.target instanceof HTMLElement && event.target.classList.contains('collapsible-header')) {
      if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault();
        const header = event.target as HTMLElement;
        if (header.textContent?.includes('Player Stats')) {
          this.togglePlayerStats();
        } else if (header.textContent?.includes('Map')) {
          this.toggleMap();
        } else if (header.textContent?.includes('Tile Actions')) {
          this.toggleTileActions();
        } else if (header.textContent?.includes('Menu')) {
          this.toggleMenu();
        }
      }
    }
  }
  toggleMap() {
    this.isMapOpen = !this.isMapOpen;
    this.saveState();
    // Use a single resize call instead of polling
    setTimeout(() => this.resizeMapGrid(), 100);
  }
  toggleTileActions() {
    this.isTileActionsOpen = !this.isTileActionsOpen;
    this.saveState();
    // Use a single resize call instead of polling
    setTimeout(() => this.resizeMapGrid(), 100);
  }
  toggleMenu() {
    this.isMenuOpen = !this.isMenuOpen;
    this.saveState();
    // Use a single resize call instead of polling
    setTimeout(() => this.resizeMapGrid(), 100);
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
      return '"playerstats" "map" "tileactions" "menu"';
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

  get playerStatsArea() { return this.isPlayerStatsOpen ? 'playerstats' : 'unset'; }
  get mapArea() { return this.isMapOpen ? 'map' : 'unset'; }
  get tileActionsArea() { return this.isTileActionsOpen ? 'tileactions' : 'unset'; }
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
    if (!this.currentCharacter) {
      return [];
    }

    const { map, xaxis, yaxis } = this.currentCharacter;

    // Prevent excessive calls with caching
    const positionKey = `${map}-${xaxis}-${yaxis}`;
    if (this._lastNPCPosition === positionKey) {
      return this._cachedNPCs || [];
    }

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

    // Old Shep in yard (3,3) - based on old demo
    if (map === 'yard' && xaxis === 3 && yaxis === 3) {
      npcs.push({
        name: 'Old Shep',
        portrait: 'default', // Will use fallback image
        description: 'The family dog, looking hungry.',
        action: 'feed'
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

    // Update cache
    this._lastNPCPosition = positionKey;
    this._cachedNPCs = npcs;

    return npcs;
  }

  getCurrentObjects(): GameObject[] {
    if (!this.currentCharacter) return [];

    const { map, xaxis, yaxis } = this.currentCharacter;

    // Prevent excessive logging and calls
    const positionKey = `${map}-${xaxis}-${yaxis}`;
    if (this._lastObjectPosition === positionKey) {
      return this._cachedObjects || [];
    }

    console.log(`Getting objects for position: ${map} (${xaxis}, ${yaxis})`);
    const objects: GameObject[] = [];

    // Fallback for unknown maps
    if (!map) {
      console.warn('No map available for current character');
      return [];
    }

    // Homeup objects
    if (map === 'homeup') {
      if (xaxis === 2 && yaxis === 2) {
        objects.push({
          name: 'Rug',
          image: 'rug',
          description: 'A comfortable rug on the floor.',
          action: 'examine'
        });
        // TEST ITEMS FOR OVERFLOW
        objects.push({
          name: 'Test Overflow Item 1',
          image: 'rug',
          description: 'This is test item 1 to check overflow in the tile action box.',
          action: 'test1'
        });
        objects.push({
          name: 'Test Overflow Item 2',
          image: 'rug',
          description: 'This is test item 2 to check overflow in the tile action box.',
          action: 'test2'
        });
        objects.push({
          name: 'Test Overflow Item 3',
          image: 'rug',
          description: 'This is test item 3 to check overflow in the tile action box.',
          action: 'test3'
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

    // Add replenishable items from the service
    if (this.currentCharacter) {
      const replenishableItems = this.replenishmentService.getReplenishableItems(
        this.currentCharacter.map,
        this.currentCharacter.xaxis,
        this.currentCharacter.yaxis
      );

      replenishableItems.forEach(item => {
        const statusText = item.currentQuantity > 0
          ? ` (${item.currentQuantity} available)`
          : ' (depleted)';

        objects.push({
          name: item.name,
          image: this.getReplenishableItemImage(item),
          description: `${item.name}${statusText}`,
          action: 'harvest'
        });
      });
    }

    console.log('Returning objects:', objects);

    // Update cache
    this._lastObjectPosition = positionKey;
    this._cachedObjects = objects;

    return objects;
  }

  /**
   * Get the appropriate image for a replenishable item
   */
  private getReplenishableItemImage(item: ReplenishableItem): string {
    switch (item.type) {
      case 'fruit':
        return 'fruittree';
      case 'herb':
        return 'herbrack';
      case 'resource':
        return 'plants';
      default:
        return 'plants';
    }
  }

  getCurrentPortals(): Portal[] {
    if (!this.currentCharacter) return [];

    const { map, xaxis, yaxis } = this.currentCharacter;

    // Prevent excessive calls with caching
    const positionKey = `${map}-${xaxis}-${yaxis}`;
    if (this._lastPortalPosition === positionKey) {
      return this._cachedPortals || [];
    }

    const portals: Portal[] = [];

    // Use the portal service to get portals for current location
    const portalAction = this.tileActionService.getPortalAction(map, xaxis, yaxis);
    if (portalAction) {
      portals.push({
        name: portalAction.portal.name,
        image: portalAction.portal.image,
        destination: this.tileActionService.getMapDisplayName(portalAction.portal.targetMap),
        description: portalAction.portal.description,
        action: this.getPortalActionText(portalAction.portal.name)
      });
    }

    // Update cache
    this._lastPortalPosition = positionKey;
    this._cachedPortals = portals;

    return portals;
  }

  private getPortalActionText(portalName: string): string {
    const actionMap: Record<string, string> = {
      'Stairs Down': 'descend',
      'Stairs Up': 'ascend',
      'Front Door': 'exit',
      'Back Door': 'exit',
      'Cellar Door': 'descend',
      'Barn Door': 'enter',
      'Ladder Out of Cellar': 'climb',
      'Father\'s House': 'enter',
      'Gate to Ishandar': 'enter',
      'Lady Marah\'s House': 'enter',
      'Cave Entrance': 'enter',
      'Gate to Ishandar Forest': 'exit',
      'Cave Exit': 'exit'
    };
    return actionMap[portalName] || 'use';
  }

  /**
   * Get the current map's display name
   */
  getCurrentMapDisplayName(): string {
    if (!this.currentCharacter) return 'Unknown Location';
    return this.tileActionService.getMapDisplayName(this.currentCharacter.map);
  }

  /**
   * Announce message to screen readers
   */
  private announceToScreenReader(message: string): void {
    // Create a live region for screen reader announcements
    const announcement = document.createElement('div');
    announcement.setAttribute('aria-live', 'polite');
    announcement.setAttribute('aria-atomic', 'true');
    announcement.style.position = 'absolute';
    announcement.style.left = '-10000px';
    announcement.style.width = '1px';
    announcement.style.height = '1px';
    announcement.style.overflow = 'hidden';
    announcement.textContent = message;

    document.body.appendChild(announcement);

    // Remove the announcement element after a short delay
    setTimeout(() => {
      if (document.body.contains(announcement)) {
        document.body.removeChild(announcement);
      }
    }, 1000);
  }

    // Interaction methods
  async interactWithNPC(npc: NPC) {
    console.log(`Interacting with ${npc.name}: ${npc.action}`);

    return runInInjectionContext(this.injector, async () => {
      // Map NPC names to dialogue IDs
      const npcDialogueMap: Record<string, string> = {
        'Father': 'father',
        'Marah': 'marah'
      };

      const dialogueId = npcDialogueMap[npc.name];
      if (dialogueId) {
        console.log('Starting dialogue for', npc.name);
        await this.dialogueService.startDialogue(dialogueId);
      } else {
        // Fallback for NPCs without dialogue
        await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          `You interact with ${npc.name}. This feature is coming soon!`
        );
      }
    });
  }

  // Debug method to check NPC visibility
  debugNPCs() {
    const npcs = this.getCurrentNPCs();
    const isMobile = this.isMobile;
    console.log('Debug NPCs:', {
      npcs,
      isMobile,
      shouldShow: !isMobile && npcs.length > 0,
      character: this.currentCharacter ? {
        name: this.currentCharacter.name,
        map: this.currentCharacter.map,
        xaxis: this.currentCharacter.xaxis,
        yaxis: this.currentCharacter.yaxis
      } : null
    });
  }

  async interactWithObject(object: GameObject) {
    console.log(`Interacting with ${object.name}: ${object.action}`);
    console.log('Object details:', object);
    console.log('Current inventory:', this.inventoryService.inventory);

    // Handle different object types based on the old PHP demo
    switch (object.name.toLowerCase()) {
      case 'water barrel':
        await this.handleWaterBarrel();
        break;
      case 'fireplace': {
        const action = await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          'You are at the fireplace. What would you like to do?',
          [
            { label: 'Light Fire', value: 'light' },
            { label: 'Rest', value: 'rest' },
            { label: 'Search Fireplace', value: 'search' },
            { label: 'Cook', value: 'cook' },
            { label: 'Cancel', value: 'cancel' }
          ]
        );
        if (action === 'light') {
          await this.handleFireplace();
        } else if (action === 'rest') {
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            [],
            'You rest by the fireplace and feel a bit warmer.'
          );
        } else if (action === 'search') {
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            [],
            'You search the fireplace but find nothing of interest.'
          );
        } else if (action === 'cook') {
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            [],
            'The cookbook and recipe system is coming soon!'
          );
        }
        break;
      }
      case 'well':
        await this.handleWell();
        break;
      case 'melon plants':
      case 'garden':
      case 'fruit tree':
        await this.handleHarvest(object.name);
        break;
      case 'chest':
        await this.handleChest();
        break;
      case 'pantry':
        await this.handlePantry();
        break;
      case 'herb rack':
        await this.handleHerbRack();
        break;
      case 'rug':
        await this.handleRug();
        break;
      case 'bed': {
        // const { actions, message } = await this.objectInteractionService.getBedInteraction();
    const actions = [
      { label: 'Sleep', value: 'sleep' },
      { label: 'Search', value: 'search' },
      { label: 'Cancel', value: 'cancel' }
    ];
    const message = 'You see a simple bed. What would you like to do?';
        const action = await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          message,
          actions
        );
        if (action && action !== 'cancel') {
          if (action === 'search' && this.currentCharacter) {
            const result = await this.tileActionService.handleTileAction(
              this.currentCharacter.map,
              this.currentCharacter.xaxis,
              this.currentCharacter.yaxis,
              'search',
              this.currentCharacter.name
            );
            await ItemFoundModalComponent.present(this.modalCtrl, result.items || [], result.message);
          } else {
            // const result = await this.objectInteractionService.handleBedAction(action);
        let result = { message: '' };
        if (action === 'sleep') {
          result = { message: 'You rest on the bed and feel a bit better.' };
        } else if (action === 'search') {
          result = { message: 'You search the bed but find nothing of interest.' };
        }
            if (result.message) {
              await ItemFoundModalComponent.present(this.modalCtrl, [], result.message);
            }
          }
        }
        break;
      }
      case 'desk':
      case 'shelf':
      case 'side table':
      case 'coatrack':
      case 'wardrobe':
      case 'table':
      case 'dog house':
      case 'chicken coop':
        if (this.currentCharacter && (object.action === 'search' || object.action === 'examine')) {
          const result = await this.tileActionService.handleTileAction(
            this.currentCharacter.map,
            this.currentCharacter.xaxis,
            this.currentCharacter.yaxis,
            object.action,
            this.currentCharacter.name
          );
          await ItemFoundModalComponent.present(this.modalCtrl, result.items || [], result.message);
        } else {
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            [],
            `You ${object.action} the ${object.name}. You find nothing of interest.`
          );
        }
        break;
      default:
        await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          `You ${object.action} the ${object.name}. This feature is coming soon!`
        );
    }
  }

  private async handleWaterBarrel() {
    console.log('Handling water barrel interaction');
    console.log('Current inventory:', this.inventoryService.inventory);

    const hasBottle = this.inventoryService.hasItem('Bottle');
    console.log('Has bottle:', hasBottle);

    if (hasBottle) {
      // Add water to bottle
      const bottleItem = this.inventoryService.inventory.find(i => i.itemname === 'Bottle');
      if (bottleItem) {
        bottleItem.waterunits = Math.min(bottleItem.waterunits + 3, bottleItem.maxwater || 10);
        await this.inventoryService.saveInventory();
        await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          'You fill your bottle with fresh water from the barrel.'
        );
      }
    } else {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'You need a bottle to collect water from the barrel.'
      );
    }
  }

  private async handleFireplace() {
    const hasFirewood = this.inventoryService.hasItem('Firewood');
    const hasTinderbox = this.inventoryService.hasItem('Tinderbox');

    if (hasFirewood && hasTinderbox) {
      // Start a fire
      await this.inventoryService.removeItem('Firewood', 1);
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'You successfully start a fire in the fireplace. The room is now warm and cozy.'
      );
    } else if (hasFirewood) {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'You have firewood but need a tinderbox to start a fire.'
      );
    } else {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'You need firewood and a tinderbox to start a fire.'
      );
    }
  }

  private async handleWell() {
    const hasBottle = this.inventoryService.hasItem('Bottle');

    if (hasBottle) {
      // Add water to bottle
      const bottleItem = this.inventoryService.inventory.find(i => i.itemname === 'Bottle');
      if (bottleItem) {
        bottleItem.waterunits = Math.min(bottleItem.waterunits + 5, bottleItem.maxwater || 10);
        await this.inventoryService.saveInventory();
        await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          'You draw fresh water from the well and fill your bottle.'
        );
      }
    } else {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'You need a bottle to collect water from the well.'
      );
    }
  }

  /**
   * Handle harvesting from plants/trees
   */
  private async handleHarvest(plantName: string) {
    if (!this.currentCharacter) return;

    // Check for replenishable items at current location
    const replenishableItems = this.replenishmentService.getReplenishableItems(
      this.currentCharacter.map,
      this.currentCharacter.xaxis,
      this.currentCharacter.yaxis
    );

    // Find matching replenishable item by name
    const matchingItem = replenishableItems.find(item =>
      item.name.toLowerCase().includes(plantName.toLowerCase()) ||
      plantName.toLowerCase().includes(item.name.toLowerCase())
    );

    if (matchingItem && matchingItem.currentQuantity > 0) {
      // Harvest from replenishable source
      const harvestedItem = await this.replenishmentService.harvestItem(
        this.currentCharacter.name,
        matchingItem.id
      );

      if (harvestedItem) {
        const item = this.inventoryService.createBasicItem(
          harvestedItem.itemData.name,
          harvestedItem.itemData.description,
          harvestedItem.itemData.type,
          harvestedItem.itemData.image,
          harvestedItem.itemData.quantity,
          harvestedItem.itemData.options || {}
        );

        const success = await this.inventoryService.addItem(item);
        if (success) {
          const foundItems: FoundItem[] = [{
            name: harvestedItem.itemData.name,
            description: harvestedItem.itemData.description,
            image: harvestedItem.itemData.image,
            quantity: harvestedItem.itemData.quantity
          }];
          const remainingText = harvestedItem.currentQuantity > 0
            ? `(${harvestedItem.currentQuantity} remaining)`
            : '(depleted)';
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            foundItems,
            `You harvest a ${harvestedItem.itemData.name.toLowerCase()} from the ${matchingItem.name.toLowerCase()}. ${remainingText}`
          );
        } else {
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            [],
            'Your inventory is full.'
          );
        }
      }
    } else {
      // Fallback to old static harvest logic for non-replenishable items
      const harvestResults: { [key: string]: any } = {
        'melon plants': { name: 'Melon', type: 'Food', image: 'melon', description: 'A juicy melon from the garden.' },
        'garden': { name: 'Vegetable', type: 'Food', image: 'vegetable', description: 'Fresh vegetables from the garden.' }
      };

      const result = harvestResults[plantName.toLowerCase()];
      if (result) {
        const item = this.inventoryService.createBasicItem(
          result.name,
          result.description,
          result.type,
          result.image,
          1,
          { consumable: 1 }
        );

        const success = await this.inventoryService.addItem(item);
        if (success) {
          const foundItems: FoundItem[] = [{
            name: result.name,
            description: result.description,
            image: result.image,
            quantity: 1
          }];
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            foundItems,
            `You harvest a ${result.name.toLowerCase()} from the ${plantName.toLowerCase()}.`
          );
        } else {
          await ItemFoundModalComponent.present(
            this.modalCtrl,
            [],
            'Your inventory is full.'
          );
        }
      }
    }
  }

  /**
   * Handle chest interaction
   */
  private async handleChest() {
    console.log('Handling chest interaction');
    console.log('Current inventory:', this.inventoryService.inventory);

    // Check if items are already in this chest (using character position as identifier)
    const chestKey = `chest_${this.currentCharacter?.name}_${this.currentCharacter?.map}_${this.currentCharacter?.xaxis}_${this.currentCharacter?.yaxis}`;
    const chestState = localStorage.getItem(chestKey);

    if (chestState === 'empty') {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'The chest is empty.'
      );
      return;
    }

    // Items that should be in this chest
    const chestItems = [
      {
        name: 'Firewood',
        description: 'With firewood and flint you can start a fire in the proper area such as a fireplace or campsite.',
        type: 'Other',
        image: 'firewood',
        quantity: 3
      },
      {
        name: 'Tinderbox',
        description: 'This tinderbox contains items to start a fire including flint and tinder.',
        type: 'Other',
        image: 'tinderbox',
        quantity: 1
      },
      {
        name: 'Key',
        description: 'A rusty old key that might unlock something.',
        type: 'Other',
        image: 'key',
        quantity: 1,
        options: { othertype: 'Tool' }
      },
      {
        name: 'Leather Armor',
        description: 'Light leather armor that provides basic protection.',
        type: 'Armor',
        image: 'leatherarmor',
        quantity: 1,
        options: { equipable: 1, armortype: 'Light', defense: 2 }
      }
    ];

    // Add all items to inventory
    const foundItems: FoundItem[] = [];
    for (const itemData of chestItems) {
      const item = this.inventoryService.createBasicItem(
        itemData.name,
        itemData.description,
        itemData.type,
        itemData.image,
        itemData.quantity,
        itemData.options || {}
      );

      const success = await this.inventoryService.addItem(item);
      if (success) {
        foundItems.push({
          name: itemData.name,
          description: itemData.description,
          image: itemData.image,
          quantity: itemData.quantity
        });
        console.log(`Added ${itemData.name} to inventory`);
      }
    }

    if (foundItems.length > 0) {
      // Mark chest as empty
      localStorage.setItem(chestKey, 'empty');
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        foundItems,
        `You found ${foundItems.length} items in the chest!`
      );
    } else {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'Your inventory is full.'
      );
    }
  }

  /**
   * Handle pantry interaction
   */
    private async handlePantry() {
    console.log('Handling pantry interaction');
    console.log('Current inventory:', this.inventoryService.inventory);

    // Check if items are already collected from this pantry
    const pantryKey = `pantry_${this.currentCharacter?.name}_${this.currentCharacter?.map}_${this.currentCharacter?.xaxis}_${this.currentCharacter?.yaxis}`;
    const pantryState = localStorage.getItem(pantryKey);

    if (pantryState === 'empty') {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'The pantry is mostly empty.'
      );
      return;
    }

    // Items that should be in this pantry
    const pantryItems = [
      {
        name: 'Bread',
        description: 'Fresh bread from the pantry.',
        type: 'Food',
        image: 'bread',
        quantity: 1,
        options: { consumable: 1 }
      },
      {
        name: 'Cheese',
        description: 'A piece of cheese from the pantry.',
        type: 'Food',
        image: 'cheese',
        quantity: 1,
        options: { consumable: 1 }
      },
      {
        name: 'Apple',
        description: 'A fresh apple from the pantry.',
        type: 'Food',
        image: 'apple',
        quantity: 1,
        options: { consumable: 1 }
      }
    ];

    // Add all items to inventory
    const foundItems: FoundItem[] = [];
    for (const itemData of pantryItems) {
      const item = this.inventoryService.createBasicItem(
        itemData.name,
        itemData.description,
        itemData.type,
        itemData.image,
        itemData.quantity,
        itemData.options || {}
      );

      const success = await this.inventoryService.addItem(item);
      if (success) {
        foundItems.push({
          name: itemData.name,
          description: itemData.description,
          image: itemData.image,
          quantity: itemData.quantity
        });
        console.log(`Added ${itemData.name} to inventory`);
      }
    }

    if (foundItems.length > 0) {
      // Mark pantry as empty
      localStorage.setItem(pantryKey, 'empty');
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        foundItems,
        `You found ${foundItems.length} food items in the pantry!`
      );
    } else {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'Your inventory is full.'
      );
    }
  }

  /**
   * Handle herb rack interaction
   */
    private async handleHerbRack() {
    console.log('Handling herb rack interaction');
    console.log('Current inventory:', this.inventoryService.inventory);

    // Check if items are already collected from this herb rack
    const herbRackKey = `herbrack_${this.currentCharacter?.name}_${this.currentCharacter?.map}_${this.currentCharacter?.xaxis}_${this.currentCharacter?.yaxis}`;
    const herbRackState = localStorage.getItem(herbRackKey);

    if (herbRackState === 'empty') {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'The herb rack is mostly empty.'
      );
      return;
    }

    // Items that should be on this herb rack
    const herbRackItems = [
      {
        name: 'Aloe',
        description: 'Aloe vera plant, useful for healing.',
        type: 'Other',
        image: 'aloe',
        quantity: 1,
        options: { othertype: 'Herb' }
      },
      {
        name: 'Cinnamon',
        description: 'Ground cinnamon spice.',
        type: 'Other',
        image: 'cinnamon',
        quantity: 1,
        options: { othertype: 'Spice' }
      },
      {
        name: 'Thyme',
        description: 'Fresh thyme herb.',
        type: 'Other',
        image: 'thyme',
        quantity: 1,
        options: { othertype: 'Herb' }
      }
    ];

    // Add all items to inventory
    let itemsFound = 0;
    for (const itemData of herbRackItems) {
      const item = this.inventoryService.createBasicItem(
        itemData.name,
        itemData.description,
        itemData.type,
        itemData.image,
        itemData.quantity,
        itemData.options || {}
      );

      const success = await this.inventoryService.addItem(item);
      if (success) {
        itemsFound++;
        console.log(`Added ${itemData.name} to inventory`);
      }
    }

    if (itemsFound > 0) {
      // Mark herb rack as empty
      localStorage.setItem(herbRackKey, 'empty');
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        `You found ${itemsFound} herbs on the herb rack!`
      );
    } else {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'Your inventory is full.'
      );
    }
  }

  /**
   * Handle rug interaction
   */
  private async handleRug() {
    console.log('Handling rug interaction');
    console.log('Current inventory:', this.inventoryService.inventory);

    // Check if the rug has already been interacted with
    const rugKey = `rug_${this.currentCharacter?.name}_${this.currentCharacter?.map}_${this.currentCharacter?.xaxis}_${this.currentCharacter?.yaxis}`;
    const rugState = localStorage.getItem(rugKey);

    if (rugState === 'empty') {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'The rug has already been examined.'
      );
      return;
    }

    // Add a hidden key item to the inventory (using old demo item name)
    const keyItem = this.inventoryService.createBasicItem(
      'Small Rusty Key',
      'A small rusty key that might unlock something.',
      'Other',
      'smallrustykey',
      1,
      { othertype: 'Tool' }
    );

    const success = await this.inventoryService.addItem(keyItem);
    if (success) {
      const foundItems: FoundItem[] = [{
        name: 'Small Rusty Key',
        description: 'A small rusty key that might unlock something.',
        image: 'smallrustykey',
        quantity: 1
      }];
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        foundItems,
        'You find a small rusty key under the rug!'
      );
      // Mark rug as empty to prevent re-interaction
      localStorage.setItem(rugKey, 'empty');
      console.log('Rug flag set to empty:', rugKey);
    } else {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        'Your inventory is full. Cannot add key.'
      );
    }
  }

  async usePortal(portal: Portal) {
    console.log(`Using portal to ${portal.destination}: ${portal.action}`);

    if (!this.currentCharacter) {
      console.error('No current character found');
      return;
    }

    // Get the portal action from the service
    const portalAction = this.tileActionService.getPortalAction(
      this.currentCharacter.map,
      this.currentCharacter.xaxis,
      this.currentCharacter.yaxis
    );

    if (!portalAction) {
      console.error('No portal action found for current location');
      return;
    }

    // Check portal requirements first
    const requirements = await this.tileActionService.checkPortalRequirements(
      portalAction.portal,
      this.currentCharacter.name
    );

    if (!requirements.canUse) {
      await ItemFoundModalComponent.present(
        this.modalCtrl,
        [],
        requirements.message || 'You cannot use this portal.'
      );
      return;
    }

    // Show confirmation dialog
    const confirmed = await ItemFoundModalComponent.present(
      this.modalCtrl,
      [],
      portalAction.portal.confirmationMessage,
      [
        { label: 'Yes', value: 'yes' },
        { label: 'No', value: 'no' }
      ]
    );

    if (confirmed === 'yes') {
      // Use the portal
      const result = await this.tileActionService.handlePortalAction(
        portalAction.portal,
        this.currentCharacter.name
      );

      if (result.success) {
        // Announce to screen readers
        this.announceToScreenReader(result.message);
        await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          result.message
        );
        // The map will be regenerated automatically due to the effect watching character changes
      } else {
        await ItemFoundModalComponent.present(
          this.modalCtrl,
          [],
          result.message
        );
      }
    }
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

  openInfoModal(action: any) {
    console.log('Opening info modal for:', action);
    this.infoModalAction = action;
    this.infoModalOpen = true;
    setTimeout(() => {
      // Save last focused element
      this.lastFocusedElement = document.activeElement as HTMLElement;
      // Focus the close button
      if (this.closeInfoBtn && this.closeInfoBtn.nativeElement) {
        this.closeInfoBtn.nativeElement.focus();
      }
    }, 0);
  }

  closeInfoModal() {
    this.infoModalOpen = false;
    this.infoModalAction = null;
    // Restore focus to last focused element
    if (this.lastFocusedElement) {
      setTimeout(() => this.lastFocusedElement?.focus(), 0);
      this.lastFocusedElement = null;
    }
  }

  @HostListener('document:keydown', ['$event'])
  handleModalKeydown(event: KeyboardEvent) {
    if (!this.infoModalOpen) return;
    if (event.key === 'Escape') {
      event.preventDefault();
      this.closeInfoModal();
    }
    // Focus trap
    const focusable = this.getModalFocusableElements();
    if (focusable.length === 0) return;
    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    if (event.key === 'Tab') {
      if (event.shiftKey) {
        if (document.activeElement === first) {
          event.preventDefault();
          last.focus();
        }
      } else {
        if (document.activeElement === last) {
          event.preventDefault();
          first.focus();
        }
      }
    }
  }

  private getModalFocusableElements(): HTMLElement[] {
    if (!this.infoModalOpen) return [];
    const modal = document.querySelector('.info-modal-content');
    if (!modal) return [];
    return Array.from(modal.querySelectorAll<HTMLElement>(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    )).filter(el => !el.hasAttribute('disabled') && !el.getAttribute('aria-hidden'));
  }

  /**
   * Reset test data - useful for testing
   * Call this from browser console: window.mainPage.resetTestData()
   */
  resetTestData() {
    console.log('Resetting test data...');

    // Clear all game-related localStorage flags
    const keysToRemove = [];
    for (let i = 0; i < localStorage.length; i++) {
      const key = localStorage.key(i);
      if (key && (key.includes('rug_') || key.includes('chest_') || key.includes('pantry_') || key.includes('herbrack_'))) {
        keysToRemove.push(key);
      }
    }

    keysToRemove.forEach(key => {
      localStorage.removeItem(key);
      console.log(`Removed: ${key}`);
    });

    console.log('Test data reset complete!');
    console.log('Create a new character or reload the page for fresh testing.');

    // Make it available globally for console access
    (window as any).mainPage = this;
  }
}
