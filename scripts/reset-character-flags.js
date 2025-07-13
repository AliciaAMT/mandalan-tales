// Script to reset character flags for testing yard items
// This will reset all flags to 0, including the new yard flags

// Usage:
// 1. Open browser console on the game page
// 2. Copy and paste this script
// 3. Run: resetCharacterFlags('YourCharacterName')

async function resetCharacterFlags(characterName) {
  try {
    // Get the character service
    const characterService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(CharacterService);

    // Reset flags
    await characterService.resetCharacterFlags(characterName);

    // Verify flags
    const flags = await characterService.getCharacterFlags(characterName);
    console.log('Flags after reset:', flags);

    console.log(`Successfully reset flags for character: ${characterName}`);
  } catch (error) {
    console.error('Error resetting flags:', error);
  }
}

// Also add a function to check current flags
async function checkCharacterFlags(characterName) {
  try {
    const characterService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(CharacterService);
    const flags = await characterService.getCharacterFlags(characterName);
    console.log('Current flags for', characterName, ':', flags);

    // Check yard flags specifically
    console.log('Yard flags:');
    console.log('yardgarden:', flags.yardgarden);
    console.log('yardmelon:', flags.yardmelon);
    console.log('yardtrees:', flags.yardtrees);
    console.log('yardcoop:', flags.yardcoop);
  } catch (error) {
    console.error('Error checking flags:', error);
  }
}

console.log('Script loaded. Use resetCharacterFlags("CharacterName") or checkCharacterFlags("CharacterName")');
