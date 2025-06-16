import { Component, OnInit } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { IonContent } from "@ionic/angular/standalone";
import { AppFooterComponent } from "../shared/footer/app-footer.component";

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss'],
  standalone: true,
  imports: [IonContent, AppHeaderComponent, AppFooterComponent],
})
export class DashboardComponent  {

  currentYear: number = new Date().getFullYear();

}
