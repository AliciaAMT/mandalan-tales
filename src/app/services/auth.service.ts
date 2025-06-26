import { Injectable } from '@angular/core';
import {
  Auth,
  signInWithEmailAndPassword,
  signOut,
  createUserWithEmailAndPassword,
  sendEmailVerification,
  sendPasswordResetEmail
} from '@angular/fire/auth';
import { Router } from '@angular/router';
// import { AngularFireAuth } from '@angular/fire/compat/auth';

const actionCodeSettings = {
  url: 'http://localhost:8100/login', // ⬅️ CHANGE THIS for production
  handleCodeInApp: false
};

@Injectable({ providedIn: 'root' })
export class AuthService {
  constructor(private auth: Auth, private router: Router) {}

  async login(email: string, password: string): Promise<any> {
    const cred = await signInWithEmailAndPassword(this.auth, email, password);

    if (!cred.user.emailVerified) {
      await signOut(this.auth);
      throw new Error('Your email address has not been verified.');
    }

    return cred;
  }

  register(email: string, password: string) {
    return createUserWithEmailAndPassword(this.auth, email, password).then(cred =>
      cred.user ? sendEmailVerification(cred.user, actionCodeSettings) : Promise.resolve()
    );
  }
  logout() {
    return signOut(this.auth);
  }

  sendPasswordResetEmail(email: string): Promise<void> {
    return sendPasswordResetEmail(this.auth, email, actionCodeSettings);
  }

  get currentUser() {
    return this.auth.currentUser;
  }
}
