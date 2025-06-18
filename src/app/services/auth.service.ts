import { Injectable } from '@angular/core';
import { Auth, signInWithEmailAndPassword, signOut,createUserWithEmailAndPassword,
  sendEmailVerification } from '@angular/fire/auth';
import { Router } from '@angular/router';

const actionCodeSettings = {
  url: 'http://localhost:8100/login', // ⬅️ CHANGE THIS for production
  handleCodeInApp: false
};

@Injectable({ providedIn: 'root' })
export class AuthService {
  constructor(private auth: Auth, private router: Router) {}

  login(email: string, password: string) {
    return signInWithEmailAndPassword(this.auth, email, password);
  }
  register(email: string, password: string) {
    return createUserWithEmailAndPassword(this.auth, email, password).then(cred =>
      cred.user ? sendEmailVerification(cred.user, actionCodeSettings) : Promise.resolve()
    );
  }
  logout() {
    return signOut(this.auth);
  }

  get currentUser() {
    return this.auth.currentUser;
  }
}
