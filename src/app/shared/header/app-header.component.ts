import { IonicModule } from '@ionic/angular';
import { Component, OnInit } from '@angular/core';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-app-header',
  templateUrl: './app-header.component.html',
  styleUrls: ['./app-header.component.scss'],
  standalone: true,
  imports: [IonicModule, RouterModule],
})
export class AppHeaderComponent  implements OnInit {

  constructor() { }

  ngOnInit() {}

}
