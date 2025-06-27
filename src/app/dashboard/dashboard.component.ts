import { Component, OnInit } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
import { CharacterService } from '../game/services/character.service';
import { CharStats } from '../game/models/charstats.model';
import { CommonModule } from '@angular/common';

import { firstValueFrom } from 'rxjs';
import { User } from '@angular/fire/auth';
import { Router, RouterModule } from '@angular/router';
import { AuthService } from '../services/auth.service';
// import { AngularFirestoreModule } from '@angular/fire/compat/firestore';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, AppFooterComponent, STANDALONE_IMPORTS, CommonModule, RouterModule],
})
export class DashboardComponent  {
  characters: CharStats[] = [];
  selectedCharacterId: string | null = null;
  maxCharacters = 6;
  currentYear: number = new Date().getFullYear();
  user: User | null = null;
  constructor(
    private characterService: CharacterService,
    private authService: AuthService,
    private router: Router
    ) {}


    async ngOnInit(): Promise<void> {
      const user = await firstValueFrom(this.authService.currentUser$);

      if (!user) {
        this.router.navigate(['/login']);
        return;
      }

      this.user = user;

      this.characterService.getCharacters().subscribe(chars => {
        this.characters = chars || [];
      });
    }


  selectCharacter(id: string): void {
    this.selectedCharacterId = id;
  }

  logout(): void {
    this.authService.logout().then(() => {
      this.router.navigate(['/login']);
    });
  }

  startGame(): void {
    if (this.selectedCharacterId) {
      // Navigate to game screen (to be implemented)
      console.log('Starting game with character:', this.selectedCharacterId);
    }
  }

}
