import { Injectable, inject } from '@angular/core';
import {
  Auth,
  User,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  signOut,
  sendPasswordResetEmail
} from '@angular/fire/auth';
import { Firestore, doc, setDoc, serverTimestamp } from '@angular/fire/firestore';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { onAuthStateChanged } from 'firebase/auth';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private auth: Auth = inject(Auth);
  private firestore: Firestore = inject(Firestore);
  private router: Router = inject(Router);

  currentUser$: Observable<User | null> = new Observable((observer) => {
    const unsubscribe = onAuthStateChanged(this.auth, (user) => {
      observer.next(user);
    });
    return { unsubscribe };
  });

  async register(email: string, password: string) {
    const cred = await createUserWithEmailAndPassword(this.auth, email, password);
    const userRef = doc(this.firestore, `users/${cred.user.uid}`);

    await setDoc(userRef, {
      uid: cred.user.uid,
      email: cred.user.email,
      displayName: cred.user.displayName || null,
      createdAt: serverTimestamp(),
      role: 'player',
    });

    return cred;
  }

  async login(email: string, password: string) {
    return await signInWithEmailAndPassword(this.auth, email, password);
  }

  logout(): Promise<void> {
    return signOut(this.auth);
  }

  // ✅ Password reset method
  async resetPassword(email: string): Promise<void> {
    return await sendPasswordResetEmail(this.auth, email);
  }
}
