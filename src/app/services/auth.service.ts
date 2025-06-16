import { Injectable } from '@angular/core';
import { Auth, signInWithPopup, GoogleAuthProvider, signOut } from '@angular/fire/auth';
import { Router } from '@angular/router';

@Injectable({ providedIn: 'root' })
export class AuthService {
  constructor(private auth: Auth, private router: Router) {}

  async loginWithGoogle() {
    const provider = new GoogleAuthProvider();
    await signInWithPopup(this.auth, provider);
    await this.router.navigateByUrl('/dashboard');
  }

  async logout() {
    await signOut(this.auth);
    await this.router.navigateByUrl('/');
  }

  get isLoggedIn(): boolean {
    return !!this.auth.currentUser;
  }
}
