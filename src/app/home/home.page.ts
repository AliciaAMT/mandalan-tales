import { Component } from '@angular/core';
import { IonContent, IonButton, IonCard, IonCardHeader, IonCardTitle, IonCardContent } from '@ionic/angular/standalone';
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { AppHeaderComponent } from "../shared/header/app-header.component";

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
  imports: [IonCardContent, IonCardTitle, IonCardHeader, IonCard, IonButton, IonContent, AppFooterComponent, AppHeaderComponent],
})
export class HomePage {
  currentYear: number = new Date().getFullYear();
}
