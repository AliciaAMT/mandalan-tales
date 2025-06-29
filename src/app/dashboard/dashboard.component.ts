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
import { ModalController } from '@ionic/angular/standalone';
import { CharacterDetailsModalComponent } from './character-details-modal/character-details-modal.component';
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
  private modalCtrl: ModalController = inject(ModalController);

  // Expose the character service signal directly
  characters = this.characterService.characters;

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
  }

  selectCharacter(id: string): void {
    this.selectedCharacterId = id;
  }

  async openCharacterDetails(character: CharStats): Promise<void> {
    const modal = await this.modalCtrl.create({
      component: CharacterDetailsModalComponent,
      componentProps: {
        character: character
      }
    });

    await modal.present();

    const { data } = await modal.onWillDismiss();
    if (data && data.deleted) {
      // If character was deleted, clear selection if it was the selected character
      if (this.selectedCharacterId === character.id) {
        this.selectedCharacterId = null;
      }

      // Log warning if deletion was incomplete
      if (data.warning) {
        console.warn('Character deletion completed with warnings - some associated data may still exist');
      }
    }
  }

  logout(): void {
    this.authService.logout().then(() => {
      this.router.navigate(['/login']);
    });
  }

  startGame(): void {
    if (this.selectedCharacterId) {
      // Navigate to game screen
      this.router.navigate(['/game']);
    }
  }
}
