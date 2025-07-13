// Test script for garden functionality
// Copy and paste this into the browser console on the game page

async function testGarden() {
  try {
    // Get the character service
    const characterService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(CharacterService);
    const tileActionService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(TileActionService);

    // Get current character
    const currentCharacter = characterService.getCurrentCharacter();
    if (!currentCharacter) {
      console.log('No character selected');
      return;
    }

    console.log('Testing garden for character:', currentCharacter.name);

    // Check current flags
    const flags = await characterService.getCharacterFlags(currentCharacter.name);
    console.log('Current yardgarden flag:', flags.yardgarden);

    // Test garden tile action
    const tileAction = tileActionService.getTileAction('yard', 2, 1);
    console.log('Garden tile action found:', !!tileAction);

    if (tileAction) {
      console.log('Tile action details:', {
        itemName: tileAction.itemName,
        flagKey: tileAction.flagKey,
        message: tileAction.message
      });

      // Check if already found
      const alreadyFound = await tileActionService['isItemAlreadyFound'](tileAction, currentCharacter.name);
      console.log('Already found:', alreadyFound);
    }

    // Test the actual interaction
    console.log('\n--- Testing garden interaction ---');
    const result = await tileActionService.handleTileAction('yard', 2, 1, currentCharacter.name);
    console.log('Interaction result:', result);

  } catch (error) {
    console.error('Error testing garden:', error);
  }
}

// Run the test
testGarden();
