import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { AfterViewInit, Component, inject, OnDestroy, effect } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
// import { SkipLinkComponent } from "../shared/skip-link/skip-link.component";
import { addIcons } from 'ionicons';
import { eye, eyeOff } from 'ionicons/icons';
import { signOut, sendEmailVerification } from '@angular/fire/auth';
import { ToastController, AlertController } from '@ionic/angular';

addIcons({
  'eye': eye,
  'eye-off': eyeOff
});

declare global {
  interface Window {
    grecaptcha: any;
  }
}

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, AppFooterComponent, FormsModule, NgIf, STANDALONE_IMPORTS, RouterModule/*, SkipLinkComponent*/],
})
export class LoginComponent implements AfterViewInit, OnDestroy {
  public authService: AuthService = inject(AuthService);
  private router: Router = inject(Router);
  private toastCtrl: ToastController = inject(ToastController);
  private alertCtrl: AlertController = inject(AlertController);

  email = '';
  password = '';
  error: string | null = null;
  currentYear: number = new Date().getFullYear();
  recaptchaSiteKey = '6LfCQmYrAAAAAAW9jUsKIkBm8uAc41MGahUqSbpe';
  private recaptchaWidgetId: any = null;
  recaptchaReady = false;
  showPassword = false;
  private timeouts: number[] = [];

  // Use the signal directly
  alreadyLoggedIn = this.authService.isLoggedIn;

  constructor() {
    // Redirect to dashboard if already logged in
    effect(() => {
      if (this.authService.authInitialized() && this.authService.user()) {
        this.router.navigate(['/dashboard']);
      }
    });
  }

  togglePasswordVisibility(): void {
    this.showPassword = !this.showPassword;
  }

  async ngAfterViewInit(): Promise<void> {
    // Temporarily disable reCAPTCHA initialization
    // TODO: Re-enable once proper invisible reCAPTCHA v2 is configured
    /*
    await this.waitForRecaptcha();

    if (this.recaptchaWidgetId === null) {
      this.recaptchaWidgetId = window.grecaptcha.render('recaptcha-container', {
        sitekey: this.recaptchaSiteKey,
        size: 'invisible',
        callback: (token: string) => this.onRecaptchaSuccess(token),
        'expired-callback': () => this.onRecaptchaExpired(),
        'error-callback': () => this.onRecaptchaError()
      });
    }

    this.recaptchaReady = true;
    */

    // For now, just mark as ready without reCAPTCHA
    this.recaptchaReady = true;
  }

  ngOnDestroy(): void {
    // Clean up all timeouts to prevent memory leaks
    this.timeouts.forEach(timeoutId => clearTimeout(timeoutId));
    this.timeouts = [];
  }

  waitForRecaptcha(): Promise<void> {
    return new Promise(resolve => {
      const interval = setInterval(() => {
        if (window.grecaptcha && window.grecaptcha.render) {
          clearInterval(interval);
          resolve();
        }
      }, 100);
    });
  }

  async login(): Promise<void> {
    this.error = null;
    console.log('Login attempted', this.email, this.password);

    const activeEl = document.activeElement as HTMLElement;
    if (activeEl && typeof activeEl.blur === 'function') {
      activeEl.blur();
    }

    try {
      const cred = await this.authService.login(this.email, this.password);

      if (!cred.user.emailVerified) {
        await this.showEmailVerificationAlert(cred.user);
        await this.authService.logout();
        return;
      }

      const toast = await this.toastCtrl.create({
        message: 'Login successful!',
        duration: 3000,
        color: 'success',
        position: 'bottom'
      });

      await toast.present();

      const timeoutId = window.setTimeout(() => {
        const toastEl = document.querySelector('ion-toast');
        if (toastEl) {
          toastEl.setAttribute('role', 'alert');
          toastEl.setAttribute('aria-live', 'assertive');
        }
      }, 100);
      this.timeouts.push(timeoutId);

      this.router.navigate(['/dashboard']);

    } catch (e: any) {
      console.error('Login error:', e);
      this.error = e.message || 'Login failed. Please try again.';
    }
  }

  async showEmailVerificationAlert(user: any): Promise<void> {
    const alert = await this.alertCtrl.create({
      header: 'Email Not Verified',
      message: 'Your email address has not been verified. Would you like us to resend the verification email?',
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          cssClass: 'secondary'
        },
        {
          text: 'Resend Email',
          handler: () => {
            this.resendVerificationEmail(user);
          }
        }
      ]
    });

    await alert.present();
  }

  async resendVerificationEmail(user: any): Promise<void> {
    try {
      await sendEmailVerification(user);
      const toast = await this.toastCtrl.create({
        message: 'Verification email sent! Please check your inbox.',
        duration: 4000,
        color: 'success',
        position: 'bottom'
      });
      await toast.present();
    } catch (error) {
      console.error('Error sending verification email:', error);
      const toast = await this.toastCtrl.create({
        message: 'Failed to send verification email. Please try again.',
        duration: 3000,
        color: 'danger',
        position: 'bottom'
      });
      await toast.present();
    }
  }

  async logout(): Promise<void> {
    await this.authService.logout();
    const toast = await this.toastCtrl.create({
      message: 'You have been logged out.',
      duration: 2000,
      color: 'medium',
      position: 'bottom',
    });
    await toast.present();
  }

  onRecaptchaSuccess(token: string): void {
    this.authService.login(this.email, this.password)
      .then(async (cred) => {
        if (!cred.user.emailVerified) {
          await this.showEmailVerificationAlert(cred.user);
          await this.authService.logout();
        } else {
          this.error = null;
          this.router.navigate(['/dashboard']);
        }
      })
      .catch(err => {
        console.error('Login error in reCAPTCHA callback:', err);
        const errorMsg = err?.message || 'Login failed. Please try again.';
        this.error = errorMsg;

        const timeoutId = window.setTimeout(() => {
          const errorEl = document.getElementById('form-error');
          if (errorEl) {
            errorEl.focus();
          }
        }, 100);
        this.timeouts.push(timeoutId);
      });
  }

  onRecaptchaExpired(): void {
    console.log('reCAPTCHA expired');
    this.error = 'reCAPTCHA expired. Please try again.';
  }

  onRecaptchaError(): void {
    console.log('reCAPTCHA error occurred');
    this.error = 'reCAPTCHA error occurred. Please try again.';
  }
}
