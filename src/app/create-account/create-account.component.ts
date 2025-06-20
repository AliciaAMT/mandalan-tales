import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { AfterViewInit, Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service'; // update path if needed
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';

declare global {
  interface Window {
    grecaptcha: any;
  }
}

@Component({
  selector: 'app-create-account',
  templateUrl: './create-account.component.html',
  styleUrls: ['./create-account.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, AppFooterComponent, FormsModule, NgIf, STANDALONE_IMPORTS, RouterModule],
})
export class CreateAccountComponent implements OnInit, AfterViewInit {
  email = '';
  password = '';
  error: string | null = null;
  currentYear: number = new Date().getFullYear();
  recaptchaSiteKey = '6LfCQmYrAAAAAAW9jUsKIkBm8uAc41MGahUqSbpe';
  private recaptchaWidgetId: any = null;
  recaptchaReady = false;

  constructor(private authService: AuthService, private router: Router) {}

  ngOnInit(): void {}

  async ngAfterViewInit(): Promise<void> {
    await this.waitForRecaptcha();

    this.recaptchaWidgetId = window.grecaptcha.render('recaptcha-container', {
      sitekey: this.recaptchaSiteKey,
      size: 'invisible',
      callback: (token: string) => this.onRecaptchaSuccess(token)
    });

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

  async createAccount(): Promise<void> {
    this.error = null;

    if (!this.recaptchaReady && window.grecaptcha) {
      await this.ngAfterViewInit(); // try to re-render
    }

    if (this.recaptchaReady) {
      window.grecaptcha.execute(this.recaptchaWidgetId);
    } else {
      this.error = 'reCAPTCHA failed to load. Please refresh and try again.';
    }
  }

  onRecaptchaSuccess(token: string): void {
    this.authService.register(this.email, this.password)
      .then(() => {
        alert('Verification email sent. Please check your inbox before logging in.');
        this.router.navigate(['/login']);
      })
      .catch(err => {
        console.error(err);
        this.error = err.message || 'Failed to create account.';
        if (window.grecaptcha && this.recaptchaWidgetId !== null) {
          window.grecaptcha.reset(this.recaptchaWidgetId);
        }
      });
  }
}
