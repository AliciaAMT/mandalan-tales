// Script to force refresh objects and clear conflicting items
// Copy and paste this into the browser console on the game page

async function forceRefreshObjects() {
  try {
    // Get the main page component
    const mainPage = window.ng.getComponent(window.document.querySelector('app-main'));
    const replenishmentService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(ReplenishmentService);
    const characterService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(CharacterService);
    const authService = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(AuthService);

    // Get current user and character
    const currentUser = authService.currentUser();
    const currentCharacter = characterService.getCurrentCharacter();

    if (!currentUser || !currentCharacter) {
      console.log('No user or character found');
      return;
    }

    console.log('Force refreshing objects for:', currentCharacter.name);

    // Clear the object cache
    mainPage.clearObjectCache();
    console.log('Object cache cleared');

    // Clear any existing Apple Tree items from the database
    const firestore = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(Firestore);
    const { collection, query, where, getDocs, deleteDoc } = await import('@angular/fire/firestore');

    const itemsRef = collection(firestore, 'replenishableItems');
    const q = query(itemsRef, where('userId', '==', currentUser.uid), where('charname', '==', currentCharacter.name));
    const snapshot = await getDocs(q);

    const appleTreeItems = snapshot.docs.filter(doc => {
      const data = doc.data();
      return data.name === 'Apple Tree' && data.location === 'yard' && data.x === 3 && data.y === 1;
    });

    if (appleTreeItems.length > 0) {
      console.log('Found', appleTreeItems.length, 'Apple Tree items to delete');
      for (const doc of appleTreeItems) {
        await deleteDoc(doc.ref);
      }
      console.log('Apple Tree items deleted');
    }

    // Reinitialize replenishable items
    await replenishmentService.initializeReplenishableItems(currentCharacter.name, currentUser.uid);
    console.log('Replenishable items reinitialized');

    // Force a map regeneration to refresh the UI
    mainPage.generateMap();
    console.log('Map regenerated');

    // Reload the page to ensure everything is fresh
    console.log('Reloading page...');
    window.location.reload();

  } catch (error) {
    console.error('Error force refreshing objects:', error);
  }
}

// Run the script
forceRefreshObjects();
