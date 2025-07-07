import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { Router, RouterModule } from '@angular/router';
import { FocusManagerDirective } from '../../../shared/focus-manager.directive';

@Component({
  selector: 'app-inventory',
  standalone: true,
  imports: [CommonModule, IonicModule, RouterModule, FocusManagerDirective],
  templateUrl: './inventory.page.html',
  styleUrls: ['./inventory.page.scss']
})
export class InventoryPage implements OnInit {
  private router = inject(Router);

  ngOnInit() {
    console.log('InventoryPage ngOnInit called');
  }

  goBack() {
    this.router.navigate(['/game']);
  }
}
