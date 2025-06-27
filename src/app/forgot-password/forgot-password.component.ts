import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule, ToastController } from '@ionic/angular';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-forgot-password',
  standalone: true,
  imports: [CommonModule, FormsModule, IonicModule],
  templateUrl: './forgot-password.component.html',
  styleUrls: ['./forgot-password.component.scss']
})
export class ForgotPasswordComponent {
  email: string = '';
  error: string = '';
  success: string = '';

  constructor(
    private authService: AuthService,
    private toastController: ToastController,
    private router: Router
  ) {}

  async resetPassword() {
    this.error = '';
    this.success = '';

    try {
      await this.authService.resetPassword(this.email);
      this.success = 'Password reset email sent. Check your inbox.';
      // this.showToast(this.success);
      this.email = '';
    } catch (err: any) {
      console.error('Reset error:', err);
      // this.error = err.message || 'An error occurred.';
      // this.showToast(this.error);
    }
  }

  // async showToast(message: string) {
  //   const toast = await this.toastController.create({
  //     message,
  //     duration: 3000,
  //     position: 'bottom',
  //   });
  //   await toast.present();
  // }
}
