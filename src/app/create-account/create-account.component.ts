import { Component, OnInit } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { IonContent } from "@ionic/angular/standalone";
import { AppFooterComponent } from "../shared/footer/app-footer.component";

@Component({
  selector: 'app-create-account',
  templateUrl: './create-account.component.html',
  styleUrls: ['./create-account.component.scss'],
  standalone: true,
  imports: [IonContent, AppHeaderComponent, AppFooterComponent],
})
export class CreateAccountComponent {

  currentYear: number = new Date().getFullYear();
}
