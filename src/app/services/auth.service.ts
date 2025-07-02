import { Injectable, inject, signal, computed, effect, NgZone } from '@angular/core';
import {
  Auth,
  User,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  signOut,
  sendPasswordResetEmail,
  onAuthStateChanged
} from '@angular/fire/auth';
import { Firestore, doc, setDoc, serverTimestamp } from '@angular/fire/firestore';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private auth: Auth = inject(Auth);
  private firestore: Firestore = inject(Firestore);
  private router: Router = inject(Router);
  private ngZone: NgZone = inject(NgZone);

  // Use signals instead of RxJS observables
  private userSignal = signal<User | null>(null);
  private authInitializedSignal = signal(false);

  user = this.userSignal.asReadonly();
  authInitialized = this.authInitializedSignal.asReadonly();
  isLoggedIn = computed(() => !!this.user());

  constructor() {
    // Set up auth state listener using signals within injection context
    this.ngZone.runOutsideAngular(() => {
      onAuthStateChanged(this.auth, user => {
        this.ngZone.run(() => {
          this.userSignal.set(user);
          this.authInitializedSignal.set(true);
          console.log('Auth state changed:', user ? 'User logged in' : 'User logged out');
        });
      });
    });
  }

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
    // If already initialized, return immediately
    if (this.authInitializedSignal()) {
      console.log('Auth already initialized');
      return;
    }

    console.log('Waiting for auth initialization...');

    // Use polling with a reasonable interval
    return new Promise((resolve) => {
      let timeoutId: number;
      let intervalId: number;

      const cleanup = () => {
        if (intervalId) clearInterval(intervalId);
        if (timeoutId) clearTimeout(timeoutId);
      };

      // Check every 100ms for initialization
      intervalId = setInterval(() => {
        if (this.authInitializedSignal()) {
          cleanup();
          console.log('Auth initialization complete');
          resolve();
        }
      }, 100);

      // Fallback timeout in case auth doesn't initialize
      timeoutId = setTimeout(() => {
        cleanup();
        console.log('Auth initialization timeout - proceeding anyway');
        resolve();
      }, 5000); // 5 second timeout
    });
  }
}
