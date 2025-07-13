// Test script for all yard items using tile action service
// Copy and paste this into the browser console on the game page

async function testYardItemsTileAction() {
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

    console.log('Testing yard items for character:', currentCharacter.name);

    // Check current flags
    const flags = await characterService.getCharacterFlags(currentCharacter.name);
    console.log('Current yard flags:', {
      yardgarden: flags.yardgarden,
      yardmelon: flags.yardmelon,
      yardtrees: flags.yardtrees,
      yardcoop: flags.yardcoop
    });

    // Test each yard item
    const yardItems = [
      { map: 'yard', x: 2, y: 1, name: 'Garden', flagKey: 'yardgarden' },
      { map: 'yard', x: 1, y: 2, name: 'Melon Plants', flagKey: 'yardmelon' },
      { map: 'yard', x: 3, y: 1, name: 'Fruit Tree', flagKey: 'yardtrees' },
      { map: 'yard', x: 3, y: 2, name: 'Chicken Coop', flagKey: 'yardcoop' }
    ];

    for (const item of yardItems) {
      console.log(`\n--- Testing ${item.name} ---`);
      console.log(`Flag ${item.flagKey}:`, flags[item.flagKey]);

      // Get tile action
      const tileAction = tileActionService.getTileAction(item.map, item.x, item.y);
      console.log('Tile action found:', !!tileAction);

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
    }

    // Test the actual interactions
    console.log('\n--- Testing actual interactions ---');
    for (const item of yardItems) {
      console.log(`\nTesting ${item.name} interaction...`);
      const result = await tileActionService.handleTileAction(item.map, item.x, item.y, currentCharacter.name);
      console.log(`${item.name} result:`, result);
    }

  } catch (error) {
    console.error('Error testing yard items:', error);
  }
}

// Run the test
testYardItemsTileAction();
