import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { Router, RouterModule } from '@angular/router';
import { FocusManagerDirective } from '../../../shared/focus-manager.directive';
import { addIcons } from 'ionicons';
import { addCircleOutline } from 'ionicons/icons';
import { AuthService } from '../../../services/auth.service';
import { SettingsService } from '../../services/settings.service';
import { DEFAULT_THEME_COLOR } from '../../models/settings.model';

@Component({
  selector: 'app-inventory',
  standalone: true,
  imports: [CommonModule, IonicModule, RouterModule, FocusManagerDirective],
  templateUrl: './inventory.page.html',
  styleUrls: ['./inventory.page.scss']
})
export class InventoryPage implements OnInit {
  private router = inject(Router);
  private authService = inject(AuthService);
  private settingsService = inject(SettingsService);

  constructor() {
    // Register the icons we're using
    addIcons({ addCircleOutline });
  }

  // Collapsible sections state
  isKeepPocketOpen = true;
  isTradePocketOpen = false;
  isFoodPocketOpen = false;
  isEquippedItemsOpen = true;

  ngOnInit() {
    console.log('InventoryPage ngOnInit called');
    this.loadUserSettings();
  }

  ionViewWillEnter() {
    console.log('InventoryPage ionViewWillEnter called');
    this.loadUserSettings();
  }

  private async loadUserSettings(): Promise<void> {
    const user = this.authService.getCurrentUser();
    if (user) {
      const settings = await this.settingsService.getUserSettings(user.uid);
      if (settings) {
        document.documentElement.style.setProperty('--theme-color', settings.themeColor);
        document.documentElement.style.setProperty('--ion-color-primary', settings.themeColor);
        const textColor = this.getTextColorForTheme(settings.themeColor);
        document.documentElement.style.setProperty('--header-text-color', textColor);
      } else {
        document.documentElement.style.setProperty('--theme-color', DEFAULT_THEME_COLOR);
        document.documentElement.style.setProperty('--ion-color-primary', DEFAULT_THEME_COLOR);
        document.documentElement.style.setProperty('--header-text-color', '#181200');
      }
    }
  }

  private getTextColorForTheme(themeColor: string): string {
    const hex = themeColor.replace('#', '');
    const r = parseInt(hex.substr(0, 2), 16);
    const g = parseInt(hex.substr(2, 2), 16);
    const b = parseInt(hex.substr(4, 2), 16);
    const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;
    return luminance < 0.5 ? '#ffffff' : '#181200';
  }

  // Toggle methods for collapsible sections
  toggleKeepPocket() {
    this.isKeepPocketOpen = !this.isKeepPocketOpen;
  }

  toggleTradePocket() {
    this.isTradePocketOpen = !this.isTradePocketOpen;
  }

  toggleFoodPocket() {
    this.isFoodPocketOpen = !this.isFoodPocketOpen;
  }

  toggleEquippedItems() {
    this.isEquippedItemsOpen = !this.isEquippedItemsOpen;
  }

  goBack() {
    this.router.navigate(['/game']);
  }
}
