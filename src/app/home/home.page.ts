import { Component, OnInit } from '@angular/core';
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
export class HomePage implements OnInit {
  currentYear: number = new Date().getFullYear();

  ngOnInit() {
    this.setGoldTheme();
  }

  private setGoldTheme() {
    document.documentElement.style.setProperty('--ion-color-primary', '#ceb167');
    document.documentElement.style.setProperty('--ion-color-primary-contrast', '#000000');
    document.documentElement.style.setProperty('--theme-color', '#ceb167');
    document.documentElement.style.setProperty('--header-text-color', '#ceb167');
  }
}
