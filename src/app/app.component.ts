import { Component, inject, effect, OnDestroy } from '@angular/core';
import { IonApp, IonRouterOutlet } from '@ionic/angular/standalone';
import { AppMenuComponent } from './shared/menu/app-menu/app-menu.component';
import { Router, NavigationEnd } from '@angular/router';
import { toSignal } from '@angular/core/rxjs-interop';
import { filter } from 'rxjs';
import { FocusManagerDirective } from './shared/focus-manager.directive';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  imports: [IonApp, IonRouterOutlet, AppMenuComponent, FocusManagerDirective],
})
export class AppComponent implements OnDestroy {
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

  ngOnDestroy(): void {
    // Clean up all timeouts to prevent memory leaks
    this.timeouts.forEach(timeoutId => clearTimeout(timeoutId));
    this.timeouts = [];
  }
}
