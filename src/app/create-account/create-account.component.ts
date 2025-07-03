import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { Component, ViewChild, ElementRef, inject, OnDestroy } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Firestore, doc, setDoc, serverTimestamp } from '@angular/fire/firestore';
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
// import { SkipLinkComponent } from "../shared/skip-link/skip-link.component";
import { addIcons } from 'ionicons';
import { eye, eyeOff } from 'ionicons/icons';
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
  selector: 'app-create-account',
  templateUrl: './create-account.component.html',
  styleUrls: ['./create-account.component.scss'],
  standalone: true,
  imports: [
    AppHeaderComponent,
    AppFooterComponent,
    RouterModule,
    FormsModule,
    NgIf,
    STANDALONE_IMPORTS
  ]
})
export class CreateAccountComponent implements OnDestroy {
  private authService: AuthService = inject(AuthService);
  private router: Router = inject(Router);
  private toastCtrl: ToastController = inject(ToastController);
  private timeouts: number[] = [];

  email: string = '';
  password: string = '';
  error: string | null = null;
  showPassword: boolean = false;

  ngOnDestroy(): void {
    // Clean up all timeouts to prevent memory leaks
    this.timeouts.forEach(timeoutId => clearTimeout(timeoutId));
    this.timeouts = [];
  }

  async createAccount() {
    this.error = null;
    try {
      await this.authService.register(this.email, this.password);
      await this.authService.logout();

      const toast = await this.toastCtrl.create({
        message: 'Account created! Please check your email and verify before logging in.',
        duration: 4000,
        color: 'success',
        position: 'bottom'
      });
      toast.role = 'alert';
      await toast.present();

      this.router.navigate(['/login']);
    } catch (err: any) {
      console.error('Account creation error:', err);
      this.error = err.message || 'An unknown error occurred.';
    }
  }

  togglePasswordVisibility() {
    this.showPassword = !this.showPassword;
  }

  submitFormIfValid(form: any) {
    if (form.valid) {
      this.createAccount();
    }
  }
}
