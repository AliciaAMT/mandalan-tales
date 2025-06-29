import { Component, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { IonicModule, ActionSheetController } from '@ionic/angular';
import { RouterModule } from '@angular/router';
import { AppHeaderComponent } from 'src/app/shared/header/app-header.component';
import { AppFooterComponent } from 'src/app/shared/footer/app-footer.component';

@Component({
  selector: 'app-create-character',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule, IonicModule, RouterModule, AppHeaderComponent, AppFooterComponent],
  templateUrl: './create-character.page.html',
  styleUrls: ['./create-character.page.scss'],
})
export class CreateCharacterPage {
  private fb: FormBuilder = inject(FormBuilder);
  private actionSheetCtrl: ActionSheetController = inject(ActionSheetController);

  characterForm: FormGroup;
  totalPoints = 36;
  formError: string | null = null;

  races = ['Human', 'Elf', 'Dwarf', 'Orc'];
  classes = ['Warrior', 'Mage', 'Thief', 'Healer'];

  portraits: string[] = [
    ...Array.from({ length: 10 }, (_, i) => `male${i + 1}`),
    ...Array.from({ length: 10 }, (_, i) => `female${i + 1}`)
  ];
  selectedPortrait = '';

  constructor() {
    this.characterForm = this.fb.group({
      name: ['', Validators.required],
      race: ['', Validators.required],
      class: ['', Validators.required],
      stats: this.fb.group({
        str: [0],
        dex: [0],
        int: [0],
        wis: [0],
        con: [0],
        cha: [0]
      })
    });
  }

  get allocatedPoints(): number {
    const stats = this.characterForm.get('stats')?.value as { [key: string]: number };
    return Object.values(stats).reduce((a, b) => a + b, 0);
  }

  getStatDisplayName(stat: string): string {
    const statNames: { [key: string]: string } = {
      str: 'Strength',
      dex: 'Dexterity',
      int: 'Intelligence',
      wis: 'Wisdom',
      con: 'Constitution',
      cha: 'Charisma'
    };
    return statNames[stat] || stat.toUpperCase();
  }

  async openPortraitSelector() {
    const buttons = this.portraits.map(portrait => ({
      text: portrait,
      icon: undefined,
      handler: () => this.selectPortrait(portrait)
    }));

    const actionSheet = await this.actionSheetCtrl.create({
      header: 'Choose a Portrait',
      buttons: [...buttons, { text: 'Cancel', role: 'cancel' }]
    });

    await actionSheet.present();
  }

  selectPortrait(portrait: string): void {
    this.selectedPortrait = portrait;
  }

  onSubmit(): void {
    this.formError = null;

    if (this.characterForm.valid && this.allocatedPoints <= this.totalPoints) {
      const formData = this.characterForm.value;
      const characterData = {
        ...formData,
        portrait: this.selectedPortrait,
        createdAt: Date.now()
      };

      console.log('Character Created:', characterData);
      // TODO: Save to Firebase
    } else {
      this.formError = 'Please fill in all required fields and ensure you have not exceeded the point limit.';
    }
  }
}
