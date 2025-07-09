import { Component } from '@angular/core';
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { AppHeaderComponent } from "../shared/header/app-header.component";
// import { SkipLinkComponent } from '../shared/skip-link/skip-link.component';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss'],
  standalone: true,
  imports: [ CommonModule, AppHeaderComponent, AppFooterComponent, RouterModule, STANDALONE_IMPORTS ],
})

export class AboutComponent {
  currentYear: number = new Date().getFullYear();
}
