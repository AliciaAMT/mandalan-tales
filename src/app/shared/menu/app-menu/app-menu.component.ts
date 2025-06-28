import { IonicModule, MenuController } from '@ionic/angular';
import { Component, OnInit, OnDestroy } from '@angular/core';
import { RouterModule, Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';
import { Subscription } from 'rxjs';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-app-menu',
  templateUrl: './app-menu.component.html',
  styleUrls: ['./app-menu.component.scss'],
  standalone: true,
  imports: [IonicModule, RouterModule, CommonModule],
})

export class AppMenuComponent implements OnInit, OnDestroy {
  isLoggedIn = false;
  private authSub: Subscription;

  constructor(private menuCtrl: MenuController, private router: Router, private authService: AuthService) {
    this.authSub = this.authService.isLoggedIn$.subscribe(
      status => this.isLoggedIn = status
    );
  }

  async navigateAndClose(path: string) {
    await this.menuCtrl.close();  // Ensure menu starts closing

    setTimeout(() => {
      this.router.navigateByUrl(path);  // Navigate after menu has time to animate
    }, 250); // small delay (~1 animation frame)
  }

  async logout() {
    await this.authService.logout();       // wait for sign out
    await this.menuCtrl.close();           // optional: close the menu
    this.router.navigate(['/login']);      // redirect
  }


  ngOnDestroy() {
    this.authSub?.unsubscribe();
  }
  ngOnInit() {}
}
