import { Component } from '@angular/core';
import { IonButton, IonCard, IonCardHeader, IonCardTitle, IonCardContent } from '@ionic/angular/standalone';
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { AppHeaderComponent } from "../shared/header/app-header.component";
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
