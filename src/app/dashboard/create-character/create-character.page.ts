import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-create-character',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule, IonicModule, RouterModule ],
  templateUrl: './create-character.page.html',
  styleUrls: ['./create-character.page.scss']
})
export class CreateCharacterPage {
  characterForm: FormGroup;
  totalPoints = 36;

  races = ['Human', 'Elf', 'Dwarf', 'Orc'];
  classes = ['Warrior', 'Mage', 'Thief', 'Healer'];

  constructor(private fb: FormBuilder) {
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

  onSubmit() {
    if (this.characterForm.valid && this.allocatedPoints <= this.totalPoints) {
      const characterData = {
        ...this.characterForm.value,
        createdAt: Date.now()
      };
      console.log('Character Created:', characterData);
      // TODO: send to Firebase
    }
  }
}
