import { Injectable, inject, runInInjectionContext, Injector } from '@angular/core';
import { Firestore, collection, doc, getDoc, setDoc, updateDoc, query, where, getDocs } from '@angular/fire/firestore';
import { UserSettings, DEFAULT_THEME_COLOR } from '../models/settings.model';

@Injectable({
  providedIn: 'root'
})
export class SettingsService {
  private injector = inject(Injector);

  async getUserSettings(userId: string): Promise<UserSettings | null> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      try {
        const settingsRef = doc(firestore, 'settings', userId);
        const settingsDoc = await getDoc(settingsRef);

        if (settingsDoc.exists()) {
          return { id: settingsDoc.id, ...settingsDoc.data() } as UserSettings;
        } else {
          // Create default settings if none exist
          const defaultSettings: UserSettings = {
            userId,
            themeColor: DEFAULT_THEME_COLOR,
            createdAt: Date.now(),
            updatedAt: Date.now()
          };
          await this.createUserSettings(defaultSettings);
          return defaultSettings;
        }
      } catch (error) {
        console.error('Error getting user settings:', error);
        return null;
      }
    });
  }

  async createUserSettings(settings: UserSettings): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      try {
        const settingsRef = doc(firestore, 'settings', settings.userId);
        await setDoc(settingsRef, settings);
      } catch (error) {
        console.error('Error creating user settings:', error);
        throw error;
      }
    });
  }

  async updateThemeColor(userId: string, themeColor: string): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      try {
        const settingsRef = doc(firestore, 'settings', userId);
        await updateDoc(settingsRef, {
          themeColor,
          updatedAt: Date.now()
        });
      } catch (error) {
        console.error('Error updating theme color:', error);
        throw error;
      }
    });
  }

  async updateUserSettings(userId: string, updates: Partial<UserSettings>): Promise<void> {
    return runInInjectionContext(this.injector, async () => {
      const firestore = inject(Firestore);
      try {
        const settingsRef = doc(firestore, 'settings', userId);
        await updateDoc(settingsRef, {
          ...updates,
          updatedAt: Date.now()
        });
      } catch (error) {
        console.error('Error updating user settings:', error);
        throw error;
      }
    });
  }
}
