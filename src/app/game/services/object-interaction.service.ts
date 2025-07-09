import { Injectable } from '@angular/core';

@Injectable({ providedIn: 'root' })
export class ObjectInteractionService {
  constructor() {}

  async getBedInteraction(): Promise<{ actions: { label: string, value: string }[], message: string }> {
    return {
      actions: [
        { label: 'Sleep', value: 'sleep' },
        { label: 'Search', value: 'search' },
        { label: 'Cancel', value: 'cancel' }
      ],
      message: 'You see a simple bed. What would you like to do?'
    };
  }

  async handleBedAction(action: string): Promise<{ message: string }> {
    if (action === 'sleep') {
      // TODO: Add health restoration logic here
      return { message: 'You rest on the bed and feel a bit better.' };
    } else if (action === 'search') {
      // Search logic is now handled by TileActionService
      return { message: 'You search the bed but find nothing of interest.' };
    }
    return { message: '' };
  }
}
