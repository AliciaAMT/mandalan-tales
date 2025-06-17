
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { IonContent, IonList, IonTitle, IonHeader, IonToolbar, IonItem, IonLabel, IonInput, IonButton, IonText, IonCardHeader, IonCardTitle, IonCard } from "@ionic/angular/standalone";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { FormsModule } from '@angular/forms';
import { Component } from '@angular/core';
import { AuthService } from '../services/auth.service'; // update path if needed
import { Router } from '@angular/router';
import { NgIf } from "@angular/common";

@Component({
  selector: 'app-create-account',
  templateUrl: './create-account.component.html',
  styleUrls: ['./create-account.component.scss'],
  standalone: true,
  imports: [IonCard, IonCardTitle, IonCardHeader,  IonButton, IonInput, IonLabel, IonItem, IonList, IonContent, AppHeaderComponent, AppFooterComponent, FormsModule, IonText, NgIf],
})
export class CreateAccountComponent {
  email = '';
  password = '';
  error: string | null = null;

  constructor(private authService: AuthService, private router: Router) {}

  createAccount() {
    this.error = null;
    this.authService.register(this.email, this.password)
      .then(() => {
        this.router.navigate(['/dashboard']); // or your post-login route
      })
      .catch(err => {
        this.error = 'Invalid credentials. Please try again.';
        console.error(err);
      });
  }
  currentYear: number = new Date().getFullYear();
}
