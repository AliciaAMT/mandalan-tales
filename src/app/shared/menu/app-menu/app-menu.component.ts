import { IonicModule, MenuController } from '@ionic/angular';
import { Component, inject, OnDestroy } from '@angular/core';
import { RouterModule, Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-app-menu',
  templateUrl: './app-menu.component.html',
  styleUrls: ['./app-menu.component.scss'],
  standalone: true,
  imports: [IonicModule, RouterModule, CommonModule],
})

export class AppMenuComponent implements OnDestroy {
  private menuCtrl: MenuController = inject(MenuController);
  private router: Router = inject(Router);
  private authService: AuthService = inject(AuthService);
  private timeouts: number[] = [];

  // Use signals instead of subscription
  isLoggedIn = this.authService.isLoggedIn;

  async navigateAndClose(path: string) {
    await this.menuCtrl.close();  // Ensure menu starts closing

    const timeoutId = window.setTimeout(() => {
      this.router.navigateByUrl(path);  // Navigate after menu has time to animate
    }, 250); // small delay (~1 animation frame)
    this.timeouts.push(timeoutId);
  }

  async logout() {
    await this.authService.logout();       // wait for sign out
    await this.menuCtrl.close();           // optional: close the menu
    this.router.navigate(['/login']);      // redirect
  }

  ngOnDestroy(): void {
    // Clean up all timeouts to prevent memory leaks
    this.timeouts.forEach(timeoutId => clearTimeout(timeoutId));
    this.timeouts = [];
  }
}
