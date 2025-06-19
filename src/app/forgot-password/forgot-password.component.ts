import { Component, OnInit } from '@angular/core';
import { IonContent } from "@ionic/angular/standalone";
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";

@Component({
  selector: 'app-forgot-password',
  templateUrl: './forgot-password.component.html',
  styleUrls: ['./forgot-password.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, IonContent, AppFooterComponent],
})
export class ForgotPasswordComponent {

  currentYear: number = new Date().getFullYear();

}
