import { Component } from '@angular/core';
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { AppHeaderComponent } from "../shared/header/app-header.component";
// import { SkipLinkComponent } from '../shared/skip-link/skip-link.component';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';

@Component({
  selector: 'app-home',
  standalone: true,
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
  imports: [AppFooterComponent, AppHeaderComponent, CommonModule, RouterModule, STANDALONE_IMPORTS],
})
export class HomePage {
  currentYear: number = new Date().getFullYear();
}
