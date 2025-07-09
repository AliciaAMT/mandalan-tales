import { Component, inject, effect, OnDestroy, OnInit } from '@angular/core';
import { IonApp, IonRouterOutlet } from '@ionic/angular/standalone';
import { AppMenuComponent } from './shared/menu/app-menu/app-menu.component';
import { Router, NavigationEnd } from '@angular/router';
import { toSignal } from '@angular/core/rxjs-interop';
import { filter } from 'rxjs';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  imports: [IonApp, IonRouterOutlet, AppMenuComponent],
})
export class AppComponent implements OnInit, OnDestroy {
  private router: Router = inject(Router);
  private timeouts: number[] = [];

  constructor() {
    // Use toSignal to convert router events to signals
    const navigationEnd$ = toSignal(
      this.router.events.pipe(
        filter(event => event instanceof NavigationEnd)
      )
    );

    // Set up effect to handle navigation end events
    effect(() => {
      const event = navigationEnd$();
      if (event) {
        // Reset theme color to default lighter gold on non-game pages
        if (!(event as NavigationEnd).urlAfterRedirects.startsWith('/game')) {
          document.documentElement.style.removeProperty('--ion-color-primary');
          document.documentElement.style.removeProperty('--theme-color');
        }
        const timeoutId = window.setTimeout(() => {
          const main = document.getElementById('main-content');
          if (main) {
            main.focus();
          }
        }, 100);
        this.timeouts.push(timeoutId);
      }
    });
  }

  ngOnInit() {
    // Set up menu state management to prevent aria-hidden issues
    // Small delay to ensure DOM is ready
    setTimeout(() => {
      this.setupMenuStateManagement();
    }, 100);
  }

          ngOnDestroy(): void {
    // Clean up all timeouts to prevent memory leaks
    this.timeouts.forEach(timeoutId => clearTimeout(timeoutId));
    this.timeouts = [];
  }

    private setupMenuStateManagement() {
    // Simple approach: just prevent aria-hidden from being set at all
    const routerOutlet = document.getElementById('main-content');
    if (routerOutlet) {
      // Override the setAttribute method to prevent aria-hidden="true"
      const originalSetAttribute = routerOutlet.setAttribute;
      routerOutlet.setAttribute = (name: string, value: string) => {
        // If trying to set aria-hidden="true", prevent it entirely
        if (name === 'aria-hidden' && value === 'true') {
          // Don't set aria-hidden, just return
          return;
        }
        // For all other cases, call the original method
        return originalSetAttribute.call(routerOutlet, name, value);
      };
    }

    // Also watch for menu state changes
    const menu = document.querySelector('ion-menu');
    if (menu) {
      menu.addEventListener('ionWillOpen', () => {
        // Add inert to router outlet before menu opens
        const routerOutlet = document.getElementById('main-content');
        if (routerOutlet) {
          routerOutlet.setAttribute('inert', '');
        }
      });

      menu.addEventListener('ionWillClose', () => {
        // Remove inert from router outlet before menu closes
        const routerOutlet = document.getElementById('main-content');
        if (routerOutlet) {
          routerOutlet.removeAttribute('inert');
        }
      });

      menu.addEventListener('ionDidClose', () => {
        // Check if aria-hidden was set during closing and remove it
        setTimeout(() => {
          const routerOutlet = document.getElementById('main-content');
          if (routerOutlet && routerOutlet.getAttribute('aria-hidden') === 'true') {
            routerOutlet.removeAttribute('aria-hidden');
          }
        }, 50);
      });
    }
  }
}
