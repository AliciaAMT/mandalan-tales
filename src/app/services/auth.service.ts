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
import { Firestore, doc, setDoc, serverTimestamp } from '@angular/fire/firestore';

// import { AngularFireAuth } from '@angular/fire/compat/auth';

const actionCodeSettings = {
  url: 'http://localhost:8100/login', // ⬅️ CHANGE THIS for production
  handleCodeInApp: false
};

@Injectable({ providedIn: 'root' })
export class AuthService {
  constructor(private auth: Auth, private router: Router, private firestore: Firestore) {}

  async login(email: string, password: string): Promise<any> {
    const cred = await signInWithEmailAndPassword(this.auth, email, password);

    if (!cred.user.emailVerified) {
      await signOut(this.auth);
      throw new Error('Your email address has not been verified.');
    }

    return cred;
  }

  async register(email: string, password: string) {
    const cred = await createUserWithEmailAndPassword(this.auth, email, password);

    const userRef = doc(this.firestore, `users/${cred.user.uid}`);
    await setDoc(userRef, {
      uid: cred.user.uid,
      email: cred.user.email,
      displayName: cred.user.displayName || null,
      createdAt: serverTimestamp(),
      role: 'player'
    });

    return cred;
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
