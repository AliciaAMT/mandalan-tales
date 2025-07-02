import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Router, RouterModule } from '@angular/router';

@Component({
  selector: 'app-bottom-icon-row',
  standalone: true,
  imports: [CommonModule, RouterModule],
  template: `
    <div class="bottom-icon-row">
      <div class="icon-item" *ngFor="let item of menuItems">
        <button type="button" (click)="onMenuClick(item)" [attr.aria-label]="item.label">
          <img [src]="item.icon" [alt]="item.label" />
          <div class="icon-label">{{ item.label }}</div>
        </button>
      </div>
    </div>
  `,
  styleUrls: ['./bottom-icon-row.component.scss']
})
export class BottomIconRowComponent {
  constructor(private router: Router) {}

  menuItems = [
    { label: 'Dashboard', icon: 'assets/items/settings.png', action: 'dashboard' },
    { label: 'Statistics', icon: 'assets/items/stats.webp', action: 'stats' },
    { label: 'Inventory', icon: 'assets/items/inventory.webp', action: 'inventory' },
    { label: 'Spellbook', icon: 'assets/items/spellbook.webp', action: 'spellbook' },
    { label: 'Skills', icon: 'assets/items/equipment.webp', action: 'skills' },
    { label: 'Cooking', icon: 'assets/items/cook.webp', action: 'cooking' },
    { label: 'Quests', icon: 'assets/items/questjournal.webp', action: 'quests' }
  ];

  onMenuClick(item: any) {
    if (item.action === 'dashboard') {
      this.router.navigate(['/dashboard']);
    } else {
      // Placeholder for future logic
      alert(`Clicked: ${item.label}`);
    }
  }
}
