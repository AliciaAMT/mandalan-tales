import { Component } from '@angular/core';
import { IonHeader, IonToolbar, IonTitle, IonContent, IonFooter, IonButton, IonCard, IonCardHeader, IonCardTitle, IonCardContent } from '@ionic/angular/standalone';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
  imports: [IonCardContent, IonCardTitle, IonCardHeader, IonCard, IonButton, IonFooter, IonHeader, IonToolbar, IonTitle, IonContent],
})
export class HomePage {
  currentYear: number = new Date().getFullYear();
}
