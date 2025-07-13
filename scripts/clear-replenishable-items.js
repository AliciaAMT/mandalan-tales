// Script to clear existing replenishable items from the database
// Copy and paste this into the browser console on the game page

async function clearReplenishableItems() {
  try {
    // Get the replenishment service
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

    console.log('Clearing replenishable items for:', currentCharacter.name);

    // Get the Firestore instance
    const firestore = window.ng.getComponent(window.document.querySelector('app-root')).injector.get(Firestore);
    const { collection, query, where, getDocs, deleteDoc } = await import('@angular/fire/firestore');

    // Query all replenishableItems for this user and character
    const itemsRef = collection(firestore, 'replenishableItems');
    const q = query(itemsRef, where('userId', '==', currentUser.uid), where('charname', '==', currentCharacter.name));
    const snapshot = await getDocs(q);

    console.log('Found', snapshot.size, 'replenishable items');

    // Delete all items
    const deletePromises = snapshot.docs.map(doc => deleteDoc(doc.ref));
    await Promise.all(deletePromises);

    console.log('All replenishable items deleted');

    // Reinitialize replenishable items (this will create new ones without Apple Tree)
    await replenishmentService.initializeReplenishableItems(currentCharacter.name, currentUser.uid);
    console.log('Replenishable items reinitialized');

    // Reload the page to refresh the UI
    window.location.reload();

  } catch (error) {
    console.error('Error clearing replenishable items:', error);
  }
}

// Run the script
clearReplenishableItems();
