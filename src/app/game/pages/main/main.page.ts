import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonContent, IonGrid, IonRow, IonCol, IonAccordionGroup, IonAccordion, IonItem, IonFooter } from '@ionic/angular/standalone';

@Component({
  selector: 'app-main',
  templateUrl: './main.page.html',
  styleUrls: ['./main.page.scss'],
  standalone: true,
  imports: [
    IonContent, CommonModule, FormsModule,
    IonGrid, IonRow, IonCol, IonAccordionGroup, IonAccordion, IonItem, IonFooter
  ]
})
export class MainPage implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
