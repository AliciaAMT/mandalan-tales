// Test script for yard items
// Copy and paste this into the browser console on the game page

async function testYardItems() {
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
    console.log('Current flags:', flags);

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
        // Check if already found
        const alreadyFound = await tileActionService['isItemAlreadyFound'](tileAction, currentCharacter.name);
        console.log('Already found:', alreadyFound);
      }
    }

  } catch (error) {
    console.error('Error testing yard items:', error);
  }
}

// Also add a function to reset flags for testing
async function resetYardFlags() {
  try {
    const characterService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(CharacterService);
    const currentCharacter = characterService.getCurrentCharacter();

    if (!currentCharacter) {
      console.log('No character selected');
      return;
    }

    // Reset only yard flags to 0
    await characterService.updateCharacterFlags(currentCharacter.name, {
      yardgarden: 0,
      yardmelon: 0,
      yardtrees: 0,
      yardcoop: 0
    });

    console.log('Reset yard flags to 0 for character:', currentCharacter.name);

    // Check flags after reset
    const flags = await characterService.getCharacterFlags(currentCharacter.name);
    console.log('Flags after reset:', {
      yardgarden: flags.yardgarden,
      yardmelon: flags.yardmelon,
      yardtrees: flags.yardtrees,
      yardcoop: flags.yardcoop
    });

  } catch (error) {
    console.error('Error resetting yard flags:', error);
  }
}

console.log('Test functions loaded:');
console.log('- testYardItems() - Check current yard item status');
console.log('- resetYardFlags() - Reset yard flags to 0 for testing');
