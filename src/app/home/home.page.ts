import { Component } from '@angular/core';
import { IonContent, IonButton, IonCard, IonCardHeader, IonCardTitle, IonCardContent } from '@ionic/angular/standalone';
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-home',
  standalone: true,
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
  imports: [IonCardContent, IonCardTitle, IonCardHeader, IonCard, IonButton, IonContent, AppFooterComponent, AppHeaderComponent, CommonModule, RouterModule],
})
export class HomePage {
  currentYear: number = new Date().getFullYear();
}
