import { Component } from '@angular/core';

@Component({
  selector: 'app-skip-link',
  templateUrl: './skip-link.component.html',
  styleUrls: ['./skip-link.component.scss'],
  standalone: true
})
export class SkipLinkComponent {
  skipToMain(event: Event): void {
    event.preventDefault();

    const target = document.getElementById('main-content');
    const ionContent = document.querySelector('ion-content');
    const scrollEl = ionContent?.shadowRoot?.querySelector('.inner-scroll') as HTMLElement;

    if (target && scrollEl) {
      const offsetTop = target.getBoundingClientRect().top + scrollEl.scrollTop;

      scrollEl.scrollTo({ top: offsetTop, behavior: 'smooth' });

      target.setAttribute('tabindex', '-1');
      target.focus({ preventScroll: true });
    }
  }


}
