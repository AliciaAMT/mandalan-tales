import { Component, OnInit, inject } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
import { CharacterService } from '../game/services/character.service';
import { CharStats } from '../game/models/charstats.model';
import { CommonModule } from '@angular/common';
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
export class DashboardComponent implements OnInit {
  private characterService: CharacterService = inject(CharacterService);
  private authService: AuthService = inject(AuthService);
  private router: Router = inject(Router);

  characters: CharStats[] = [];
  selectedCharacterId: string | null = null;
  maxCharacters = 6;
  currentYear: number = new Date().getFullYear();
  user: User | null = null;

  async ngOnInit(): Promise<void> {
    const user = this.authService.getCurrentUser();

    if (!user) {
      this.router.navigate(['/login']);
      return;
    }

    this.user = user;

    // Use signals to get characters
    this.characters = this.characterService.getCharacters();
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
