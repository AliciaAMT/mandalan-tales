import { Component, OnInit } from '@angular/core';
import { IonContent } from "@ionic/angular/standalone";
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, AppFooterComponent, IonContent],
})
export class ContactComponent {

  currentYear: number = new Date().getFullYear();

}
