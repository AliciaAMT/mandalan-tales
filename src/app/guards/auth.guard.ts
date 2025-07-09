import { Injectable, inject } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import { AuthService } from '../services/auth.service';
import { ToastController } from '@ionic/angular';

@Injectable({
  providedIn: 'root',
})
export class AuthGuard implements CanActivate {
  private authService = inject(AuthService);
  private router = inject(Router);
  private toastCtrl = inject(ToastController);

  async canActivate(): Promise<boolean> {
    // Wait for auth to be initialized before checking login state
    await this.authService.waitForAuthInit();

    // Get the current user
    const user = this.authService.getCurrentUser();

    // Only allow if logged in AND email is verified
    if (user && user.emailVerified) {
      return true;
    } else {
      // Show a toast to explain why navigation is blocked
      const toast = await this.toastCtrl.create({
        message: user && !user.emailVerified ? 'Please verify your email before entering the game.' : 'You must be logged in to access this page.',
        duration: 4000,
        color: 'danger',
        position: 'bottom'
      });
      await toast.present();
      this.router.navigate(['/login']);
      return false;
    }
  }
}
