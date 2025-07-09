const admin = require('firebase-admin');

// Initialize Firebase Admin (you'll need to set up service account)
// admin.initializeApp({
//   credential: admin.credential.applicationDefault(),
//   projectId: 'your-project-id'
// });

// For testing without Firebase Admin, we'll create a script that generates the data
function createTestCharacter() {
  const testCharacter = {
    name: 'TestCharacter',
    email: 'test@example.com',
    level: 1,
    experience: 0,
    life: 100,
    mana: 50,
    map: 'homeup',
    xaxis: 2,
    yaxis: 2,
    mapdimensions: 33,
    strength: 10,
    dexterity: 10,
    intelligence: 10,
    vitality: 10,
    luck: 10,
    created: new Date().toISOString()
  };

  const testInventory = [
    {
      itemname: 'Bottle',
      description: 'A bottle for carrying water.',
      type: 'Other',
      image: 'bottle',
      quantity: 1,
      waterunits: 0,
      maxwater: 10,
      othertype: 'Container',
      contentType: 'NA'
    },
    {
      itemname: 'Purse',
      description: 'A small purse. The only way to know what it contains is to open it.',
      type: 'Other',
      image: 'purse',
      quantity: 1,
      othertype: 'Container',
      contentType: 'gold'
    }
  ];

  console.log('Test Character Data:');
  console.log(JSON.stringify(testCharacter, null, 2));
  console.log('\nTest Inventory Data:');
  console.log(JSON.stringify(testInventory, null, 2));

  console.log('\nTo use this in Firebase:');
  console.log('1. Set up Firebase Admin SDK');
  console.log('2. Use admin.firestore().collection("characters").add(testCharacter)');
  console.log('3. Use admin.firestore().collection("inventories").add(testInventory)');
}

createTestCharacter();
