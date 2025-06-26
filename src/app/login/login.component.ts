import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { AfterViewInit, Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
// import { SkipLinkComponent } from "../shared/skip-link/skip-link.component";
import { addIcons } from 'ionicons';
import { eye, eyeOff } from 'ionicons/icons';
import { signOut } from '@angular/fire/auth';
import { ToastController } from '@ionic/angular';

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
export class LoginComponent implements OnInit, AfterViewInit {
  email = '';
  password = '';
  error: string | null = null;
  currentYear: number = new Date().getFullYear();
  recaptchaSiteKey = '6LfCQmYrAAAAAAW9jUsKIkBm8uAc41MGahUqSbpe';
  private recaptchaWidgetId: any = null;
  recaptchaReady = false;
  showPassword = false;
  alreadyLoggedIn: boolean = false;


  togglePasswordVisibility(): void {
    this.showPassword = !this.showPassword;
  }

  constructor(private authService: AuthService, private router: Router,
    private toastCtrl: ToastController) {}

  ngOnInit(): void {
    if (this.authService.currentUser) {
      this.alreadyLoggedIn = true;
    }
  }

  async ngAfterViewInit(): Promise<void> {
    await this.waitForRecaptcha();

    if (this.recaptchaWidgetId === null) {
      this.recaptchaWidgetId = window.grecaptcha.render('recaptcha-container', {
        sitekey: this.recaptchaSiteKey,
        size: 'invisible',
        callback: (token: string) => this.onRecaptchaSuccess(token)
      });
    }

    this.recaptchaReady = true;
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

    if (!this.recaptchaReady && window.grecaptcha && this.recaptchaWidgetId === null) {
      await this.ngAfterViewInit(); // render if not yet rendered
    }

    try {
      if (this.recaptchaReady) {
        window.grecaptcha.reset(this.recaptchaWidgetId);
        const token = await window.grecaptcha.execute(this.recaptchaWidgetId);
        if (!token) {
          this.error = 'reCAPTCHA verification failed.';
          return;
        }

        const cred = await this.authService.login(this.email, this.password);

        if (!cred.user.emailVerified) {
          await this.authService.logout();
          this.error = 'Your email address has not been verified.';
          return;
        }

        const toast = await this.toastCtrl.create({
          message: 'Login successful!',
          duration: 3000,
          color: 'success',
          position: 'bottom'
        });

        await toast.present();

        setTimeout(() => {
          const toastEl = document.querySelector('ion-toast');
          if (toastEl) {
            toastEl.setAttribute('role', 'alert');
            toastEl.setAttribute('aria-live', 'assertive');
          }
        }, 100);

        this.router.navigate(['/dashboard']);

      } else {
        this.error = 'Login failed. Try reloading the page.';
      }
    } catch (e: any) {
      console.error('Login error:', e);
      this.error = e.message || 'Login failed. Please try again.';
    }
  }
  async logout(): Promise<void> {
    await this.authService.logout();
    this.alreadyLoggedIn = false;
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
      .then((cred) => {
        if (!cred.user.emailVerified) {
          this.authService.logout();
          this.error = 'Your email is not verified. Please check your inbox before logging in.';
        } else {
          this.error = null;
          this.router.navigate(['/dashboard']);
        }
      })
      .catch(err => {
        const errorMsg = err?.message?.includes('email') || err?.message?.includes('verified')
          ? 'Your email is not verified. Please check your inbox.'
          : 'Invalid credentials. Please try again.';
        this.error = errorMsg;
        console.error(err);

        setTimeout(() => {
          const errorEl = document.getElementById('form-error');
          if (errorEl) {
            errorEl.focus();
          }
        }, 100);
      });
  }
}
