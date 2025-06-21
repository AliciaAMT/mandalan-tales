import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-skip-link',
  templateUrl: './skip-link.component.html',
  styleUrls: ['./skip-link.component.scss'],
  standalone: true,
})
export class SkipLinkComponent {
  skipToMain(): void {
    const main = document.getElementById('main-content');
    if (main) {
      main.scrollIntoView({ behavior: 'smooth', block: 'start' });
      main.focus();
    }

    // Remove visible focus from the button after a short delay
    setTimeout(() => {
      const active = document.activeElement as HTMLElement;
      if (active?.classList.contains('skip-link')) {
        active.blur();
      }
    }, 100);
  }


}
