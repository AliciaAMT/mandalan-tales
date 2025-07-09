// Simple script to reset test data
function resetTestData() {
  console.log('Clearing localStorage...');

  // Clear all localStorage keys related to the game
  const keysToRemove = [];
  for (let i = 0; i < localStorage.length; i++) {
    const key = localStorage.key(i);
    if (key && (key.includes('rug_') || key.includes('chest_') || key.includes('pantry_') || key.includes('herbrack_'))) {
      keysToRemove.push(key);
    }
  }

  keysToRemove.forEach(key => {
    localStorage.removeItem(key);
    console.log(`Removed: ${key}`);
  });

  console.log('Test data reset complete!');
  console.log('Now create a new character in the app for fresh testing.');
}

// Run the reset
resetTestData();
