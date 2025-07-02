import { Directive, ElementRef, OnInit, OnDestroy, Input, NgZone } from '@angular/core';

@Directive({
  selector: '[appFocusManager]',
  standalone: true
})
export class FocusManagerDirective implements OnInit, OnDestroy {
  @Input() appFocusManager: string | boolean = true;

  private focusedElement: HTMLElement | null = null;

  constructor(private el: ElementRef, private ngZone: NgZone) {}

        ngOnInit() {
    // Convert string to boolean if needed
    const isEnabled = this.appFocusManager === true || this.appFocusManager === 'true';
    if (!isEnabled) return;

    // Simple approach: just watch for menu state and manage focus
    this.watchMenuState();

    // Watch for focus events to track the currently focused element
    this.el.nativeElement.addEventListener('focusin', (event: FocusEvent) => {
      this.focusedElement = event.target as HTMLElement;
    }, true);
  }

          ngOnDestroy() {
    // Remove menu event listeners
    const menu = document.querySelector('ion-menu');
    if (menu) {
      menu.removeEventListener('ionWillOpen', this.onMenuWillOpen);
      menu.removeEventListener('ionDidOpen', this.onMenuDidOpen);
    }
  }

    private onMenuWillOpen = () => {
    // Proactively move focus before the menu opens
    setTimeout(() => {
      const menuElement = document.querySelector('ion-menu') as HTMLElement;
      if (menuElement) {
        menuElement.focus();
      }
    }, 10);
  };

  private onMenuDidOpen = () => {
    // Ensure focus is on the menu after it opens
    const menuElement = document.querySelector('ion-menu') as HTMLElement;
    if (menuElement && menuElement !== this.focusedElement) {
      menuElement.focus();
    }
  };

  private watchMenuState() {
    // Watch for menu open/close events
    const menu = document.querySelector('ion-menu');
    if (menu) {
      menu.addEventListener('ionWillOpen', this.onMenuWillOpen);
      menu.addEventListener('ionDidOpen', this.onMenuDidOpen);
    }
  }
}
