
import { AppHeaderComponent } from "../shared/header/app-header.component";

import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { Component } from '@angular/core';
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

export class CreateAccountComponent {
  email = '';
  password = '';
  error: string | null = null;
  recaptchaSiteKey = '6LcYP2UrAAAAANpOHNicmadpslJ6_Pq0kfkSiCTC'; // from Google reCAPTCHA
  constructor(private authService: AuthService, private router: Router) {}


  createAccount() {
    const token = (window as any).grecaptcha.getResponse();
    if (!token) {
      this.error = 'Please complete the CAPTCHA';
      return;
    }

    this.error = null;
    this.authService.register(this.email, this.password)
      .then(() => {
        alert('Verification email sent. Please check your inbox before logging in.');
        this.router.navigate(['/login']);
      })
      .catch(err => {
        console.error(err);
        this.error = err.message || 'Failed to create account. Please try again.';
        (window as any).grecaptcha.reset();

      });
  }
  ngAfterViewInit() {
    const grecaptcha = (window as any).grecaptcha;
    if (grecaptcha && grecaptcha.render) {
      grecaptcha.render(document.querySelector('.g-recaptcha'), {
        sitekey: this.recaptchaSiteKey
      });
    }
  }
  currentYear: number = new Date().getFullYear();
}
