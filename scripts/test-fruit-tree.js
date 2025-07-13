// Test script for fruit tree functionality
// Copy and paste this into the browser console on the game page

async function testFruitTree() {
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

    console.log('Testing fruit tree for character:', currentCharacter.name);

    // Check current flags
    const flags = await characterService.getCharacterFlags(currentCharacter.name);
    console.log('Current yardtrees flag:', flags.yardtrees);

    // Test fruit tree tile action
    const tileAction = tileActionService.getTileAction('yard', 3, 1);
    console.log('Fruit tree tile action found:', !!tileAction);

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
    console.log('\n--- Testing fruit tree interaction ---');
    const result = await tileActionService.handleTileAction('yard', 3, 1, currentCharacter.name);
    console.log('Interaction result:', result);

  } catch (error) {
    console.error('Error testing fruit tree:', error);
  }
}

// Run the test
testFruitTree();
