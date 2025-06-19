import { Component, OnInit } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { IonContent } from "@ionic/angular/standalone";
import { AppFooterComponent } from "../shared/footer/app-footer.component";

@Component({
  selector: 'app-legal',
  templateUrl: './legal.component.html',
  styleUrls: ['./legal.component.scss'],
  standalone: true,
  imports: [IonContent, AppHeaderComponent, AppFooterComponent],
})
export class LegalComponent {

  currentYear: number = new Date().getFullYear();
}
