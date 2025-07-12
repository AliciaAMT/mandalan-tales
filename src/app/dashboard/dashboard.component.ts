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
import { ModalController, AlertController, ToastController } from '@ionic/angular/standalone';
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
  private toastCtrl: ToastController = inject(ToastController);

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
          // Don't call loadUserSettings here - let ngOnInit handle it
        }
      }
      // Do NOT auto-navigate to dashboard here!
    });
  }

  async ngOnInit() {
    // The character service will automatically load characters when auth is ready
    // But we still need to load user settings
    console.log('Dashboard ngOnInit called');
    const user = this.authService.getCurrentUser();
    console.log('Dashboard user:', user?.uid, 'emailVerified:', user?.emailVerified);

    if (user && user.emailVerified) {
      this.user = user;
      console.log('Loading user settings for:', user.uid);
      await this.loadUserSettings();
    } else {
      console.log('User not available or not verified');
    }
  }

  ionViewWillEnter() {
    // Reset theme to lighter gold color when entering dashboard
    const lighterGold = '#ceb167'; // Lighter gold for non-game pages
    document.documentElement.style.setProperty('--theme-color', lighterGold);
    document.documentElement.style.setProperty('--ion-color-primary', lighterGold);
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

      // Show success toast instead of alert
      const toast = await this.toastCtrl.create({
        message: `Character "${character.name}" and all associated data have been permanently removed.`,
        duration: 3000,
        position: 'top',
        color: 'success'
      });
      toast.role = 'alert';
      await toast.present();

      // Focus management: move focus to create character button or beginning of page
      setTimeout(() => {
        // Try to find the create character button first
        const createButton = document.querySelector('ion-button[routerlink="/create-account"]') as HTMLElement;
        if (createButton && document.contains(createButton)) {
          createButton.focus();
          console.log('Focus moved to create character button');
        } else {
          // Fallback: focus the dashboard focus anchor at the top
          const anchor = document.getElementById('dashboard-focus-anchor') as HTMLElement;
          if (anchor) {
            anchor.focus();
            console.log('Focus moved to dashboard anchor');
          }
        }
      }, 100);
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
    // Store the currently focused element before showing the alert
    const focusedElement = document.activeElement as HTMLElement;
    console.log('Initial focused element:', focusedElement);

    const alert = await this.alertCtrl.create({
      header: 'Reset Character',
      message: `This will completely reset "${character.name}" to a brand new state. This will delete ALL inventory items, clear ALL game progress, and reset ALL flags. This action cannot be undone.`,
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          handler: () => {
            console.log('Cancel clicked, restoring focus to:', focusedElement);
            // Restore focus when user cancels
            if (focusedElement && document.contains(focusedElement)) {
              setTimeout(() => {
                if (document.contains(focusedElement)) {
                  focusedElement.focus();
                  console.log('Focus restored after cancel to:', focusedElement);
                }
              }, 100);
            }
          }
        },
        {
          text: 'Reset Character',
          role: 'destructive',
          handler: () => {
            console.log('Reset clicked, proceeding with reset for element:', focusedElement);
            this.performCharacterReset(character, focusedElement);
          }
        }
      ],
      backdropDismiss: false,
      keyboardClose: true
    });

    await alert.present();
  }

  private async performCharacterReset(character: CharStats, focusedElement: HTMLElement | null): Promise<void> {
    console.log('Performing complete reset for character:', character.name);

    try {
      // 1. Clear all localStorage flags for this character
      const keysToRemove = [];
      for (let i = 0; i < localStorage.length; i++) {
        const key = localStorage.key(i);
        if (key && (
          key.includes(`_${character.name}_`) ||
          key.includes('rug_') ||
          key.includes('chest_') ||
          key.includes('pantry_') ||
          key.includes('herbrack_') ||
          key.includes('shelf_') ||
          key.includes('drawer_') ||
          key.includes('table_') ||
          key.includes('wardrobe_') ||
          key.includes('desk_') ||
          key.includes('coatrack_') ||
          key.includes('bed_') ||
          key.includes('fireplace_') ||
          key.includes('rack_') ||
          key.includes('contentcollapse')
        )) {
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

      // 4. Clear skills for this character from Firestore
      try {
        await this.characterService.clearCharacterSkills(character.name);
        console.log('Cleared skills from Firestore');
      } catch (error) {
        console.error('Error clearing skills:', error);
      }

      // 5. Clear spellbook for this character from Firestore
      try {
        await this.characterService.clearCharacterSpellbook(character.name);
        console.log('Cleared spellbook from Firestore');
      } catch (error) {
        console.error('Error clearing spellbook:', error);
      }

      // 6. Clear cookbook for this character from Firestore
      try {
        await this.characterService.clearCharacterCookbook(character.name);
        console.log('Cleared cookbook from Firestore');
      } catch (error) {
        console.error('Error clearing cookbook:', error);
      }

      // 7. Clear enemy data for this character from Firestore
      try {
        await this.characterService.clearCharacterEnemyData(character.name);
        console.log('Cleared enemy data from Firestore');
      } catch (error) {
        console.error('Error clearing enemy data:', error);
      }

      // 8. Clear counters for this character from Firestore
      try {
        await this.characterService.clearCharacterCounters(character.name);
        console.log('Cleared counters from Firestore');
      } catch (error) {
        console.error('Error clearing counters:', error);
      }

      // 9. Reset all character flags to 0 (like a new character)
      try {
        await this.characterService.resetCharacterFlags(character.name);
        console.log('Reset all character flags to 0');
      } catch (error) {
        console.error('Error resetting character flags:', error);
      }

      // 10. Reset character level to 1 (leave other stats alone)
      if (character.id) {
        await this.characterService.updateCharacter(character.id, { level: 1 });
        console.log('Reset character level to 1');
      }

      console.log('Complete character reset finished for:', character.name);

      // Show success message as a toast instead of an alert
      const toast = await this.toastCtrl.create({
        message: `Character "${character.name}" has been completely reset to a brand new state. All inventory, progress, and flags have been cleared.`,
        duration: 3000,
        position: 'top',
        color: 'success'
      });
      toast.role = 'alert';
      await toast.present();

      // Focus restoration happens immediately after reset completes
      console.log('About to restore focus to:', focusedElement);

      // Focus back to the character card for this specific character
      const characterCards = Array.from(document.querySelectorAll('ion-card'));
      for (const card of characterCards) {
        const cardElement = card as HTMLElement;
        const cardText = cardElement.textContent || '';
        if (cardText.includes(character.name) && document.contains(cardElement)) {
          // Try to find a focusable element within this card
          const focusableElements = Array.from(cardElement.querySelectorAll('ion-button, ion-item, [tabindex], button, a'));
          for (const element of focusableElements) {
            const focusableElement = element as HTMLElement;
            if (document.contains(focusableElement) && focusableElement.offsetParent !== null) {
              FocusManagerDirective.removeFocusFromNonAlertElements();
              requestAnimationFrame(() => {
                focusableElement.focus({ preventScroll: true });
                console.log('Focus restored to element in character card:', focusableElement);
              });
              return;
            }
          }
          // If no focusable element found, make the card itself focusable and focus it
          cardElement.setAttribute('tabindex', '-1');
          FocusManagerDirective.removeFocusFromNonAlertElements();
          requestAnimationFrame(() => {
            cardElement.focus({ preventScroll: true });
            console.log('Focus restored to character card:', cardElement);
          });
          return;
        }
      }
      // If we can't find the specific character card, try any card
      const anyCard = document.querySelector('ion-card') as HTMLElement;
      if (anyCard && document.contains(anyCard)) {
        const focusableElements = Array.from(anyCard.querySelectorAll('ion-button, ion-item, [tabindex], button, a'));
        for (const element of focusableElements) {
          const focusableElement = element as HTMLElement;
          if (document.contains(focusableElement) && focusableElement.offsetParent !== null) {
            FocusManagerDirective.removeFocusFromNonAlertElements();
            requestAnimationFrame(() => {
              focusableElement.focus({ preventScroll: true });
              console.log('Focus restored to element in any card:', focusableElement);
            });
            return;
          }
        }
      }
      // Fallback: focus a hidden anchor at the top of the dashboard
      const anchor = document.getElementById('dashboard-focus-anchor') as HTMLElement;
      if (anchor) {
        anchor.setAttribute('tabindex', '-1');
        requestAnimationFrame(() => {
          anchor.focus({ preventScroll: true });
          console.log('Focus restored to dashboard anchor:', anchor);
        });
        return;
      }
      console.log('No character card or fallback anchor found');

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
      await errorAlert.onDidDismiss();

      // Restore focus to the original element after error
      if (focusedElement && document.contains(focusedElement)) {
        // First, remove focus from any non-alert elements
        FocusManagerDirective.removeFocusFromNonAlertElements();

        // Then restore focus to the original element with multiple attempts
        setTimeout(() => {
          if (document.contains(focusedElement)) {
            focusedElement.focus();
            console.log('Focus restored to:', focusedElement);
          }
        }, 100);

        setTimeout(() => {
          if (document.contains(focusedElement)) {
            focusedElement.focus();
            console.log('Second focus attempt to:', focusedElement);
          }
        }, 300);

        setTimeout(() => {
          if (document.contains(focusedElement)) {
            focusedElement.focus();
            console.log('Third focus attempt to:', focusedElement);
          }
        }, 600);
      }
    }
  }
}
