import { IonicModule, MenuController } from '@ionic/angular';
import { Component, OnInit } from '@angular/core';
import { RouterModule, Router } from '@angular/router';

@Component({
  selector: 'app-app-menu',
  templateUrl: './app-menu.component.html',
  styleUrls: ['./app-menu.component.scss'],
  standalone: true,
  imports: [IonicModule, RouterModule],
})
export class AppMenuComponent implements OnInit {

  constructor(private menuCtrl: MenuController, private router: Router) {}

  async navigateAndClose(path: string) {
    await this.menuCtrl.close();  // Ensure menu starts closing

    setTimeout(() => {
      this.router.navigateByUrl(path);  // Navigate after menu has time to animate
    }, 250); // small delay (~1 animation frame)
  }

  ngOnInit() {}
}
