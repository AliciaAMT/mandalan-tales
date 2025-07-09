import { Directive, ElementRef, HostListener, Input, OnInit, OnDestroy } from '@angular/core';

@Directive({
  selector: '[appFocusManager]',
  standalone: true
})
export class FocusManagerDirective implements OnInit, OnDestroy {
  @Input() appFocusManager: 'remove' | 'prevent' | boolean | string = 'remove';

  private observer: MutationObserver | null = null;

  constructor(private el: ElementRef) {}

  ngOnInit() {
    // Convert various input types to the expected behavior
    const behavior = this.getBehavior();

    // Set up mutation observer to watch for alert elements
    this.observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'childList') {
          mutation.addedNodes.forEach((node) => {
            if (node instanceof HTMLElement && node.tagName === 'ION-ALERT') {
              this.handleAlertAdded(node);
            }
          });
        }
      });
    });

    this.observer.observe(document.body, {
      childList: true,
      subtree: true
    });
  }

  ngOnDestroy() {
    if (this.observer) {
      this.observer.disconnect();
    }
  }

  private getBehavior(): 'remove' | 'prevent' {
    // Handle various input types for backward compatibility
    if (typeof this.appFocusManager === 'string') {
      if (this.appFocusManager === 'remove' || this.appFocusManager === 'prevent') {
        return this.appFocusManager;
      }
      // If it's a string but not the expected values, treat as 'remove'
      return 'remove';
    }

    if (typeof this.appFocusManager === 'boolean') {
      return this.appFocusManager ? 'remove' : 'prevent';
    }

    // Default to 'remove'
    return 'remove';
  }

  private handleAlertAdded(alertElement: HTMLElement) {
    // Watch for when the alert is about to be dismissed
    const dismissObserver = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'attributes' && mutation.attributeName === 'aria-hidden') {
          const ariaHidden = alertElement.getAttribute('aria-hidden');
          if (ariaHidden === 'true') {
            // Remove focus from all alert buttons before aria-hidden is applied
            this.removeFocusFromAlert(alertElement);
            dismissObserver.disconnect();
          }
        }
      });
    });

    dismissObserver.observe(alertElement, {
      attributes: true,
      attributeFilter: ['aria-hidden']
    });
  }

  private removeFocusFromAlert(alertElement: HTMLElement) {
    // Remove focus from all buttons in the alert
    const buttons = alertElement.querySelectorAll('button, .alert-button, ion-focusable, [tabindex]');
    buttons.forEach((button: Element) => {
      if (button instanceof HTMLElement) {
        button.blur();
      }
    });

    // Remove focus from the alert element itself
    alertElement.blur();
  }

  @HostListener('click', ['$event'])
  onClick(event: Event) {
    const behavior = this.getBehavior();
    if (behavior === 'remove') {
      // Only remove focus from non-alert elements before the click action
      this.removeFocusFromNonAlertElements();
    }
  }

  @HostListener('keydown', ['$event'])
  onKeyDown(event: KeyboardEvent) {
    const behavior = this.getBehavior();
    if (behavior === 'prevent' && event.key === 'Tab') {
      // Prevent tab navigation to maintain focus control
      event.preventDefault();
    }
  }

  private removeFocusFromNonAlertElements() {
    // Remove focus from any focused element that's not in an alert
    if (document.activeElement instanceof HTMLElement) {
      const activeElement = document.activeElement;
      // Check if the active element is inside an alert
      const isInAlert = activeElement.closest('ion-alert');
      if (!isInAlert) {
        activeElement.blur();
      }
    }

    // Remove focus from all buttons and focusable elements that are not in alerts
    const allFocusableElements = document.querySelectorAll('button, [tabindex], input, select, textarea, a[href], ion-button, ion-focusable');
    allFocusableElements.forEach((element: Element) => {
      if (element instanceof HTMLElement) {
        const isInAlert = element.closest('ion-alert');
        if (!isInAlert) {
          element.blur();
        }
      }
    });

    // Set focus to body to ensure no non-alert element has focus
    if (document.body instanceof HTMLElement) {
      document.body.focus();
      document.body.blur();
    }
  }

  // Static method that can be called from components
  static removeAllFocus() {
    // Remove focus from any focused element
    if (document.activeElement instanceof HTMLElement) {
      document.activeElement.blur();
    }

    // Remove focus from all buttons and focusable elements
    const allFocusableElements = document.querySelectorAll('button, [tabindex], input, select, textarea, a[href], ion-button, .alert-button, ion-focusable');
    allFocusableElements.forEach((element: Element) => {
      if (element instanceof HTMLElement) {
        element.blur();
      }
    });

    // Set focus to body to ensure no element has focus
    if (document.body instanceof HTMLElement) {
      document.body.focus();
      document.body.blur();
    }
  }

  // Static method for removing focus only from non-alert elements
  static removeFocusFromNonAlertElements() {
    // Remove focus from any focused element that's not in an alert
    if (document.activeElement instanceof HTMLElement) {
      const activeElement = document.activeElement;
      // Check if the active element is inside an alert
      const isInAlert = activeElement.closest('ion-alert');
      if (!isInAlert) {
        activeElement.blur();
      }
    }

    // Remove focus from all buttons and focusable elements that are not in alerts
    const allFocusableElements = document.querySelectorAll('button, [tabindex], input, select, textarea, a[href], ion-button, ion-focusable');
    allFocusableElements.forEach((element: Element) => {
      if (element instanceof HTMLElement) {
        const isInAlert = element.closest('ion-alert');
        if (!isInAlert) {
          element.blur();
        }
      }
    });

    // Set focus to body to ensure no non-alert element has focus
    if (document.body instanceof HTMLElement) {
      document.body.focus();
      document.body.blur();
    }
  }
}
