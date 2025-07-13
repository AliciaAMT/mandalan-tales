// Debug script to check yard flag values
const { initializeApp } = require('firebase/app');
const { getFirestore, doc, getDoc } = require('firebase/firestore');

// Firebase config (copy from your environment)
const firebaseConfig = {
  // Add your Firebase config here
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

async function checkYardFlags(characterName) {
  try {
    const flagsDoc = await getDoc(doc(db, 'flags', characterName));
    if (flagsDoc.exists()) {
      const flags = flagsDoc.data();
      console.log('Yard flags for', characterName, ':');
      console.log('yardgarden:', flags.yardgarden);
      console.log('yardmelon:', flags.yardmelon);
      console.log('yardtrees:', flags.yardtrees);
      console.log('yardcoop:', flags.yardcoop);
    } else {
      console.log('No flags found for character:', characterName);
    }
  } catch (error) {
    console.error('Error checking flags:', error);
  }
}

// Usage: node debug-flags.js <characterName>
const characterName = process.argv[2];
if (characterName) {
  checkYardFlags(characterName);
} else {
  console.log('Usage: node debug-flags.js <characterName>');
}
