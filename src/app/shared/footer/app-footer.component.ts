import { Component, OnInit } from '@angular/core';
import { IonFooter, IonToolbar, IonTitle } from "@ionic/angular/standalone";

import { IonicModule } from '@ionic/angular';
@Component({
  selector: 'app-app-footer',
  templateUrl: './app-footer.component.html',
  styleUrls: ['./app-footer.component.scss'],
  imports: [IonicModule],
  standalone: true,
})
export class AppFooterComponent {
  currentYear: number = new Date().getFullYear();
}
