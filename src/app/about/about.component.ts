import { Component} from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { IonContent} from "@ionic/angular/standalone";
import { AppFooterComponent } from "../shared/footer/app-footer.component";

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss'],
  standalone: true,
  imports: [ IonContent, AppHeaderComponent, AppFooterComponent],
})
export class AboutComponent {

  currentYear: number = new Date().getFullYear();

}
