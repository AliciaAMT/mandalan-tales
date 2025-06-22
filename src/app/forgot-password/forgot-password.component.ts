import { AppHeaderComponent } from "../shared/header/app-header.component";

import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { AfterViewInit, Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
import { SkipLinkComponent } from "../shared/skip-link/skip-link.component";

@Component({
  selector: 'app-forgot-password',
  templateUrl: './forgot-password.component.html',
  styleUrls: ['./forgot-password.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, AppFooterComponent, FormsModule, NgIf, STANDALONE_IMPORTS, RouterModule, SkipLinkComponent],
})
export class ForgotPasswordComponent implements OnInit {
  email = '';
  error: string | null = null;
  message: string | null = null;

  constructor(private authService: AuthService, private router: Router) {}

  ngOnInit(): void {}

  async resetPassword(): Promise<void> {
    this.error = null;
    this.message = null;

    try {
      await this.authService.sendPasswordResetEmail(this.email);
      this.message = 'Check your email for a password reset link.';
      setTimeout(() => {
        const msgEl = document.getElementById('form-message');
        if (msgEl) {
          msgEl.focus();
        }
      }, 100);
    } catch (err: any) {
      this.error = 'Failed to send reset link. Please try again.';
      console.error(err);

      setTimeout(() => {
        const errorEl = document.getElementById('form-error');
        if (errorEl) {
          errorEl.focus();
        }
      }, 100);
    }
  }
}
