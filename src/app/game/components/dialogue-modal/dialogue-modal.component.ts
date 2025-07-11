import { Component, inject, computed, signal, ViewChild, ElementRef, AfterViewInit, ChangeDetectorRef } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';
import { DialogueService } from '../../services/dialogue.service';
import { CharacterService } from '../../services/character.service';
import { DialogueOption } from '../../models/dialogue.model';
import { FocusTrapDirective } from '../../../shared/focus-trap.directive';

@Component({
  selector: 'app-dialogue-modal',
  standalone: true,
  imports: [CommonModule, IonicModule, FocusTrapDirective],
  template: `
    <!--
      NPC section uses green border/accent and white font for name.
      Player section uses blue border/accent (Ionic default) and white font.
    -->
    <div class="dialogue-overlay" *ngIf="isDialogueOpen()" (click)="closeDialogue()">
      <div class="dialogue-modal" appFocusTrap tabindex="-1" (click)="$event.stopPropagation()">
        <!-- NPC Section -->
        <div class="npc-section">
          <div class="npc-portrait">
            <img
              [src]="'assets/portraits/' + currentDialogue()?.npcPortrait + '.png'"
              [alt]="currentDialogue()?.npcName + ' portrait'"
              (error)="onPortraitError($event)"
            />
          </div>
          <div class="npc-info">
            <h3 class="npc-name">{{ currentDialogue()?.npcName }}</h3>
            <div class="npc-text" [innerHTML]="currentNode()?.npcText"></div>
          </div>
        </div>

        <!-- Player Options -->
        <div class="player-section">
          <div class="player-portrait">
            <img
              [src]="'assets/portraits/transparent/' + currentCharacter()?.portrait + '.png'"
              [alt]="currentCharacter()?.name + ' portrait'"
              (error)="onPlayerPortraitError($event)"
            />
          </div>
          <div class="player-options">
            <button
              *ngFor="let option of availableOptions()"
              class="dialogue-option"
              (click)="selectOption(option.id)"
              (keydown.enter)="selectOption(option.id)"
              (keydown.space)="selectOption(option.id)"
              tabindex="0"
              [attr.aria-label]="'Choose: ' + option.text"
            >
              {{ option.text }}
            </button>
          </div>
        </div>

        <!-- Close Button -->
        <button
          #closeBtn
          class="close-dialogue-btn"
          (click)="closeDialogue()"
          tabindex="0"
          aria-label="Close dialogue"
        >
          ×
        </button>
      </div>
    </div>
  `,
  styleUrls: ['./dialogue-modal.component.scss']
})
export class DialogueModalComponent implements AfterViewInit {
  private dialogueService = inject(DialogueService);
  private characterService = inject(CharacterService);
  private cdr = inject(ChangeDetectorRef);

  @ViewChild('closeBtn') closeBtn!: ElementRef<HTMLButtonElement>;

  // Computed values from service
  public readonly isDialogueOpen = this.dialogueService.isDialogueOpen;
  public readonly currentDialogue = this.dialogueService.currentDialogue;
  public readonly currentNode = this.dialogueService.currentNode;
  public readonly availableOptions = computed(() => this.dialogueService.getAvailableOptions());

  // Character info
  public readonly currentCharacter = computed(() => this.characterService.getCurrentCharacter());

  ngAfterViewInit() {
    // Focus the close button when the modal opens
    if (this.isDialogueOpen() && this.closeBtn) {
      setTimeout(() => {
        this.closeBtn?.nativeElement?.focus();
      }, 0);
    }
    // In case the modal is opened after view init, also watch for open state
    this.cdr.detectChanges();
  }

  /**
   * Select a dialogue option
   */
  selectOption(optionId: string): void {
    this.dialogueService.selectOption(optionId);
  }

  /**
   * Close the dialogue
   */
  closeDialogue(): void {
    this.dialogueService.closeDialogue();
  }

  /**
   * Handle NPC portrait loading errors
   */
  onPortraitError(event: any): void {
    if (event?.target) {
      event.target.style.display = 'none';
    }
  }

  /**
   * Handle player portrait loading errors
   */
  onPlayerPortraitError(event: any): void {
    if (event?.target) {
      event.target.style.display = 'none';
    }
  }
}
