// Debug script to check what objects are being displayed at the fruit tree location
// Copy and paste this into the browser console on the game page

async function debugYardObjects() {
  try {
    // Get the main page component
    const mainPage = window.ng.getComponent(window.document.querySelector('app-main'));
    const characterService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(CharacterService);
    const replenishmentService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(ReplenishmentService);

    // Get current character
    const currentCharacter = characterService.getCurrentCharacter();
    if (!currentCharacter) {
      console.log('No character selected');
      return;
    }

    console.log('Debugging yard objects for character:', currentCharacter.name);
    console.log('Current position:', currentCharacter.map, currentCharacter.xaxis, currentCharacter.yaxis);

    // Check if we're at the fruit tree location
    if (currentCharacter.map === 'yard' && currentCharacter.xaxis === 3 && currentCharacter.yaxis === 1) {
      console.log('At fruit tree location (3, 1)');

      // Get static objects
      const staticObjects = mainPage.getCurrentObjects();
      console.log('Static objects:', staticObjects);

      // Get replenishable items
      const replenishableItems = replenishmentService.getReplenishableItems('yard', 3, 1);
      console.log('Replenishable items:', replenishableItems);

      // Check if there are any Apple Tree items in the database
      const firestore = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(Firestore);
      const { collection, query, where, getDocs } = await import('@angular/fire/firestore');

      const itemsRef = collection(firestore, 'replenishableItems');
      const q = query(itemsRef, where('charname', '==', currentCharacter.name));
      const snapshot = await getDocs(q);

      const allItems = snapshot.docs.map(docSnap => ({ id: docSnap.id, ...docSnap.data() }));
      const appleTreeItems = allItems.filter(item => item.name === 'Apple Tree');

      console.log('All replenishable items in database:', allItems);
      console.log('Apple Tree items in database:', appleTreeItems);

    } else {
      console.log('Not at fruit tree location. Move to yard (3, 1) to test.');
    }

  } catch (error) {
    console.error('Error debugging yard objects:', error);
  }
}

// Run the debug
debugYardObjects();
