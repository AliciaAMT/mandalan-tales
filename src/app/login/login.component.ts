import { Component, OnInit } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { IonContent, IonList, IonTitle, IonHeader, IonToolbar, IonItem, IonLabel, IonInput, IonButton, IonText, IonCardHeader, IonCardTitle, IonCard } from "@ionic/angular/standalone";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
  standalone: true,
  imports: [IonCard, IonCardTitle, IonCardHeader,  IonButton, IonInput, IonLabel, IonItem, IonList, IonContent, AppHeaderComponent, AppFooterComponent, FormsModule],
})
export class LoginComponent {
  email = '';
  password = '';

  login() {
    console.log('Logging in:', this.email, this.password);
  }
  currentYear: number = new Date().getFullYear();
}
