import { Directive, ElementRef, HostListener, OnInit, OnDestroy } from '@angular/core';

@Directive({
  selector: '[appFocusTrap]',
  standalone: true
})
export class FocusTrapDirective implements OnInit, OnDestroy {
  private previouslyFocused: HTMLElement | null = null;

  constructor(private el: ElementRef<HTMLElement>) {}

  ngOnInit() {
    // Save the element that was focused before opening the modal
    this.previouslyFocused = document.activeElement as HTMLElement;
    // Focus the first focusable element in the modal, or the modal itself
    setTimeout(() => {
      const focusable = this.getFocusableElements();
      if (focusable.length) {
        (focusable[0] as HTMLElement).focus();
      } else {
        this.el.nativeElement.focus();
      }
    });
  }

  ngOnDestroy() {
    // Restore focus to the previously focused element
    if (this.previouslyFocused) {
      this.previouslyFocused.focus();
    }
  }

  @HostListener('keydown', ['$event'])
  handleKeydown(event: KeyboardEvent) {
    if (event.key !== 'Tab') return;
    const focusable = this.getFocusableElements();
    if (!focusable.length) return;
    const first = focusable[0] as HTMLElement;
    const last = focusable[focusable.length - 1] as HTMLElement;
    const active = document.activeElement as HTMLElement;
    if (event.shiftKey) {
      // Shift+Tab
      if (active === first || !this.el.nativeElement.contains(active)) {
        event.preventDefault();
        last.focus();
      }
    } else {
      // Tab
      if (active === last) {
        event.preventDefault();
        first.focus();
      }
    }
  }

  private getFocusableElements(): HTMLElement[] {
    const root = this.el.nativeElement;
    return Array.from(
      root.querySelectorAll<HTMLElement>(
        'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])'
      )
    ).filter(el => !el.hasAttribute('disabled') && !el.getAttribute('aria-hidden'));
  }
}
