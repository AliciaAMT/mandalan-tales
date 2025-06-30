import { Directive, ElementRef, OnInit, OnDestroy, Input, NgZone } from '@angular/core';

@Directive({
  selector: '[appFocusManager]',
  standalone: true
})
export class FocusManagerDirective implements OnInit, OnDestroy {
  @Input() appFocusManager: string | boolean = true;

  private observer: MutationObserver | null = null;
  private originalTabIndex: string | null = null;
  private originalInert: string | null = null;
  private focusedElement: HTMLElement | null = null;

  constructor(private el: ElementRef, private ngZone: NgZone) {}

  ngOnInit() {
    // Convert string to boolean if needed
    const isEnabled = this.appFocusManager === true || this.appFocusManager === 'true';
    if (!isEnabled) return;

    // Watch for aria-hidden changes
    this.observer = new MutationObserver((mutations) => {
      this.ngZone.run(() => {
        mutations.forEach((mutation) => {
          if (mutation.type === 'attributes' && mutation.attributeName === 'aria-hidden') {
            const target = mutation.target as HTMLElement;
            const isHidden = target.getAttribute('aria-hidden') === 'true';

            if (isHidden) {
              // When hidden, handle focus management
              this.handleElementHidden(target);
            } else {
              // When shown, restore focus management
              this.handleElementShown(target);
            }
          }
        });
      });
    });

    this.observer.observe(this.el.nativeElement, {
      attributes: true,
      attributeFilter: ['aria-hidden'],
      subtree: true
    });

    // Also watch for focus events to track the currently focused element
    this.el.nativeElement.addEventListener('focusin', (event: FocusEvent) => {
      this.focusedElement = event.target as HTMLElement;
    }, true);
  }

  ngOnDestroy() {
    if (this.observer) {
      this.observer.disconnect();
    }
  }

  private handleElementHidden(element: HTMLElement) {
    // Check if the hidden element contains the currently focused element
    if (this.focusedElement && element.contains(this.focusedElement)) {
      // Move focus to the router outlet or body
      this.moveFocusToRouterOutletOrBody();
    }

    // Use the inert attribute instead of aria-hidden for better accessibility
    if (!element.hasAttribute('inert')) {
      this.originalInert = element.getAttribute('inert');
      element.setAttribute('inert', '');
    }

    // Also remove focusable elements from tab order as backup
    this.removeFromTabOrder(element);
  }

  private handleElementShown(element: HTMLElement) {
    // Remove the inert attribute
    if (element.hasAttribute('inert') && !this.originalInert) {
      element.removeAttribute('inert');
    } else if (this.originalInert) {
      element.setAttribute('inert', this.originalInert);
      this.originalInert = null;
    }

    // Restore focusable elements
    this.restoreTabOrder(element);
  }

  private moveFocusToRouterOutletOrBody() {
    // Try to focus the router outlet itself
    const routerOutlet = document.getElementById('main-content');
    if (routerOutlet && routerOutlet !== this.focusedElement) {
      (routerOutlet as HTMLElement).focus();
      return;
    }
    // Fallback: focus the body
    (document.body as HTMLElement).focus();
  }

  private removeFromTabOrder(element: HTMLElement) {
    const focusableElements = element.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );

    focusableElements.forEach((el) => {
      const htmlEl = el as HTMLElement;
      if (!htmlEl.hasAttribute('data-original-tabindex')) {
        const currentTabIndex = htmlEl.getAttribute('tabindex');
        htmlEl.setAttribute('data-original-tabindex', currentTabIndex || '');
        htmlEl.setAttribute('tabindex', '-1');
      }
    });
  }

  private restoreTabOrder(element: HTMLElement) {
    const focusableElements = element.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex="-1"]'
    );

    focusableElements.forEach((el) => {
      const htmlEl = el as HTMLElement;
      const originalTabIndex = htmlEl.getAttribute('data-original-tabindex');
      if (originalTabIndex) {
        htmlEl.setAttribute('tabindex', originalTabIndex);
        htmlEl.removeAttribute('data-original-tabindex');
      } else {
        htmlEl.removeAttribute('tabindex');
      }
    });
  }
}
