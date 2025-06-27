import { Component } from '@angular/core';
import { IonicModule, ToastController } from '@ionic/angular';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';
import { sendPasswordResetEmail } from 'firebase/auth';
import { auth } from 'src/app/firebase-init';

@Component({
  selector: 'app-forgot-password',
  standalone: true,
  imports: [CommonModule, FormsModule, IonicModule, RouterModule],
  templateUrl: './forgot-password.component.html',
  styleUrls: ['./forgot-password.component.scss']
})
export class ForgotPasswordComponent {
  email = '';
  error = '';
  message = '';

  constructor(private toastController: ToastController) {}

  async resetPassword(): Promise<void> {
    this.error = '';
    this.message = '';
    try {
      await sendPasswordResetEmail(auth, this.email);
      this.message = 'Reset link sent to your email.';
      this.showToast(this.message);
    } catch (err: any) {
      this.error = err.message || 'Failed to send reset email.';
    }
  }

  async showToast(msg: string) {
    const toast = await this.toastController.create({
      message: msg,
      duration: 3000,
      position: 'bottom',
      color: 'success',
      buttons: [{ text: 'OK', role: 'cancel' }]
    });
    await toast.present();
  }
}
