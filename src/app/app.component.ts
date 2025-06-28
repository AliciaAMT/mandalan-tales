import { Component, inject, effect } from '@angular/core';
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
export class AppComponent {
  private router: Router = inject(Router);

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
        setTimeout(() => {
          const main = document.getElementById('main-content');
          if (main) {
            main.focus();
          }
        }, 100);
      }
    });
  }
}
