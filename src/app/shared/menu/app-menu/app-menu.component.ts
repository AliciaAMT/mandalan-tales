import { IonicModule } from '@ionic/angular';
import { Component, OnInit } from '@angular/core';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-app-menu',
  templateUrl: './app-menu.component.html',
  styleUrls: ['./app-menu.component.scss'],
  standalone: true,
  imports: [IonicModule, RouterModule],
})
export class AppMenuComponent  implements OnInit {

  constructor() { }

  ngOnInit() {}

}
