
import { AppHeaderComponent } from "../shared/header/app-header.component";

import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { AfterViewInit, Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service'; // update path if needed
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
import { SkipLinkComponent } from "../shared/skip-link/skip-link.component";

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
  imports: [AppHeaderComponent, AppFooterComponent, FormsModule, NgIf, STANDALONE_IMPORTS, RouterModule, SkipLinkComponent],
})
export class LoginComponent implements OnInit, AfterViewInit {
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

async login(): Promise<void> {
  this.error = null;

  if (!this.recaptchaReady && window.grecaptcha) {
    await this.ngAfterViewInit(); // re-render if needed
  }

  if (this.recaptchaReady) {
    window.grecaptcha.execute(this.recaptchaWidgetId);
  } else {
    this.error = 'reCAPTCHA failed to load. Please refresh and try again.';
  }
}

onRecaptchaSuccess(token: string): void {
  // Optional: send token to backend to verify
  this.authService.login(this.email, this.password)
    .then(() => this.router.navigate(['/dashboard']))
    .catch(err => {
      this.error = 'Invalid credentials. Please try again.';
      console.error(err);

      // Accessibility: move focus to error
      setTimeout(() => {
        const errorEl = document.getElementById('form-error');
        if (errorEl) {
          errorEl.focus();
        }
      }, 100);
    });
}
}
