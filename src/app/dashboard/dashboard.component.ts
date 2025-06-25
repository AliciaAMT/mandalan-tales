import { Component, OnInit } from '@angular/core';
import { AppHeaderComponent } from "../shared/header/app-header.component";
import { AppFooterComponent } from "../shared/footer/app-footer.component";
import { STANDALONE_IMPORTS } from '../shared/standalone-imports';
import { CharacterService } from '../game/services/character.service';
import { CharStats } from '../game/models/charstats.model';
import { CommonModule } from '@angular/common';

import { IonHeader } from "@ionic/angular/standalone";
// import { AngularFirestoreModule } from '@angular/fire/compat/firestore';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss'],
  standalone: true,
  imports: [AppHeaderComponent, AppFooterComponent, STANDALONE_IMPORTS, CommonModule],
})
export class DashboardComponent  {
  characters: CharStats[] = [];
  selectedCharacterId: string | null = null;
  maxCharacters = 6;
  currentYear: number = new Date().getFullYear();

  constructor(private characterService: CharacterService) {}

  ngOnInit(): void {
    this.characterService.getCharacters().subscribe(chars => {
      this.characters = chars || [];
    });
  }

  selectCharacter(id: string): void {
    this.selectedCharacterId = id;
  }

  startGame(): void {
    if (this.selectedCharacterId) {
      // Navigate to game screen (to be implemented)
      console.log('Starting game with character:', this.selectedCharacterId);
    }
  }

}
