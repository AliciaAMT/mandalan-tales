
import { AppHeaderComponent } from "../shared/header/app-header.component";

import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { AfterViewInit, Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service'; // update path if needed
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';



@Component({
  selector: 'app-create-account',
  templateUrl: './create-account.component.html',
  styleUrls: ['./create-account.component.scss'],
  standalone: true,
  imports: [ AppHeaderComponent, AppFooterComponent, FormsModule, NgIf, STANDALONE_IMPORTS, RouterModule],
})

export class CreateAccountComponent implements OnInit, AfterViewInit {
  email = '';
  password = '';
  error: string | null = null;
  currentYear: number = new Date().getFullYear();
  recaptchaSiteKey = '6LfCQmYrAAAAAAW9jUsKIkBm8uAc41MGahUqSbpe';
  private recaptchaWidgetId: any = null;

  constructor(private authService: AuthService, private router: Router) {}

  ngOnInit(): void {
    (window as any).onRecaptchaSuccess = (token: string) => {
      this.authService.register(this.email, this.password)
        .then(() => {
          alert('Verification email sent. Please check your inbox before logging in.');
          this.router.navigate(['/login']);
        })
        .catch(err => {
          console.error(err);
          this.error = err.message || 'Failed to create account.';
          (window as any).grecaptcha.reset(this.recaptchaWidgetId);
        });
    };
  }

  ngAfterViewInit(): void {
    const grecaptcha = (window as any).grecaptcha;
    if (grecaptcha && grecaptcha.render) {
      this.recaptchaWidgetId = grecaptcha.render('recaptcha-container', {
        sitekey: this.recaptchaSiteKey,
        size: 'invisible',
        callback: (token: string) => {
          (window as any).onRecaptchaSuccess(token);
        }
      });
    }
  }

  createAccount(): void {
    this.error = null;
    const grecaptcha = (window as any).grecaptcha;
    if (!grecaptcha || this.recaptchaWidgetId == null) {
      this.error = 'CAPTCHA failed to load.';
      return;
    }

    grecaptcha.execute(this.recaptchaWidgetId);
  }
}
