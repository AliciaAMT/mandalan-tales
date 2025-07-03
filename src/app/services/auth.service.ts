import { Injectable, inject, signal, computed, effect, NgZone, runInInjectionContext, Injector } from '@angular/core';
import {
  Auth,
  User,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  signOut,
  sendPasswordResetEmail,
  onAuthStateChanged,
  sendEmailVerification
} from '@angular/fire/auth';
import { Firestore, doc, setDoc, serverTimestamp } from '@angular/fire/firestore';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private ngZone: NgZone = inject(NgZone);
  private injector = inject(Injector);

  // Use signals instead of RxJS observables
  private userSignal = signal<User | null>(null);
  private authInitializedSignal = signal(false);

  user = this.userSignal.asReadonly();
  authInitialized = this.authInitializedSignal.asReadonly();
  isLoggedIn = computed(() => !!this.user());

  constructor() {
    // Set up auth state listener using signals within injection context
    this.ngZone.runOutsideAngular(() => {
      const auth = inject(Auth);
      onAuthStateChanged(auth, user => {
        this.ngZone.run(() => {
          this.userSignal.set(user);
          this.authInitializedSignal.set(true);
          console.log('Auth state changed:', user ? 'User logged in' : 'User logged out');
        });
      });
    });
  }

  register(email: string, password: string) {
    return runInInjectionContext(this.injector, () => {
      const auth = inject(Auth);
      const firestore = inject(Firestore);
      return (async () => {
        const cred = await createUserWithEmailAndPassword(auth, email, password);
        const userRef = doc(firestore, `users/${cred.user.uid}`);
        await setDoc(userRef, {
          uid: cred.user.uid,
          email: cred.user.email,
          displayName: cred.user.displayName || null,
          createdAt: serverTimestamp(),
          role: 'player',
        });
        if (cred.user) {
          await sendEmailVerification(cred.user);
        }
        return cred;
      })();
    });
  }

  login(email: string, password: string) {
    return runInInjectionContext(this.injector, () => {
      const auth = inject(Auth);
      return (async () => {
        return await signInWithEmailAndPassword(auth, email, password);
      })();
    });
  }

  logout(): Promise<void> {
    return runInInjectionContext(this.injector, () => {
      const auth = inject(Auth);
      return signOut(auth);
    });
  }

  // ✅ Password reset method
  async resetPassword(email: string): Promise<void> {
    return runInInjectionContext(this.injector, () => {
      const auth = inject(Auth);
      return sendPasswordResetEmail(auth, email);
    });
  }

  // Helper method to get current user synchronously
  getCurrentUser(): User | null {
    return this.user();
  }

  // Helper method to check if auth is initialized
  isAuthInitialized(): boolean {
    return this.authInitialized();
  }

  // Wait for auth to be initialized
  async waitForAuthInit(): Promise<void> {
    if (this.authInitializedSignal()) {
      console.log('Auth already initialized');
      return;
    }
    console.log('Waiting for auth initialization...');
    return new Promise((resolve) => {
      let timeoutId: number;
      let intervalId: number;
      const cleanup = () => {
        if (intervalId) clearInterval(intervalId);
        if (timeoutId) clearTimeout(timeoutId);
      };
      intervalId = setInterval(() => {
        if (this.authInitializedSignal()) {
          cleanup();
          console.log('Auth initialization complete');
          resolve();
        }
      }, 100);
      timeoutId = setTimeout(() => {
        cleanup();
        console.log('Auth initialization timeout - proceeding anyway');
        resolve();
      }, 5000);
    });
  }
}
