import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { Component, ViewChild, ElementRef, inject } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Firestore, doc, setDoc, serverTimestamp } from '@angular/fire/firestore';
import { Router, RouterModule } from '@angular/router';
import { NgIf } from "@angular/common";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
// import { SkipLinkComponent } from "../shared/skip-link/skip-link.component";
import { addIcons } from 'ionicons';
import { eye, eyeOff } from 'ionicons/icons';
import { sendEmailVerification } from '@angular/fire/auth';
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
export class CreateAccountComponent {
  private authService: AuthService = inject(AuthService);
  private router: Router = inject(Router);
  private toastCtrl: ToastController = inject(ToastController);
  private firestore: Firestore = inject(Firestore);

  email: string = '';
  password: string = '';
  error: string | null = null;
  showPassword: boolean = false;

  async createAccount() {
    this.error = null;
    try {
      const cred = await this.authService.register(this.email, this.password);

      await sendEmailVerification(cred.user);
      await this.createUserInFirestore(cred.user);
      await this.authService.logout();

      const toast = await this.toastCtrl.create({
        message: 'Account created! Please check your email and verify before logging in.',
        duration: 4000,
        color: 'success',
        position: 'bottom'
      });

      // Patch for accessibility
      toast.role = 'alert';
      await toast.present();

      setTimeout(() => {
        const toastEl = document.querySelector('ion-toast');
        if (toastEl) {
          toastEl.setAttribute('role', 'alert');
          toastEl.setAttribute('aria-live', 'assertive');
        }
      }, 100); // Allow time for DOM render

      this.router.navigate(['/login']);
    } catch (err: any) {
      this.error = err.message || 'An unknown error occurred.';
    }
  }

  async createUserInFirestore(user: any) {
    const userRef = doc(this.firestore, `users/${user.uid}`);
    await setDoc(userRef, {
      uid: user.uid,
      email: user.email,
      displayName: user.displayName || null,
      createdAt: serverTimestamp(),
      role: 'player',
    }, { merge: true });
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
