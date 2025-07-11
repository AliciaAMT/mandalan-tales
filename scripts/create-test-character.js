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
    lockpicking: 5, // Add lockpicking skill for testing
    blockpicking: 2,
    bthieving: 3,
    bluck: 1,
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
    },
    {
      itemname: 'Locked Box',
      description: 'You remember hiding your most valued possession in this lockbox. It requires a special key.',
      type: 'Other',
      image: 'lockedbox',
      quantity: 1,
      keylock: 1,
      othertype: 'Container',
      contentType: 'fixed',
      fixedContent: 'Sharpened Bone Dagger'
    },
    {
      itemname: 'Small Rusty Key',
      description: 'A small rusty key that might unlock something.',
      type: 'Other',
      image: 'smallrustykey',
      quantity: 1,
      othertype: 'Tool'
    },
    {
      itemname: 'Lockpick',
      description: 'A tool for picking locks.',
      type: 'Other',
      image: 'lockpick',
      quantity: 2,
      othertype: 'Tool'
    },
    {
      itemname: 'Chest',
      description: 'A sturdy wooden chest.',
      type: 'Other',
      image: 'chest',
      quantity: 1,
      keylock: 1,
      locklevel: 15,
      othertype: 'Container',
      contentType: 'random'
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

  console.log('\nTest Scenarios:');
  console.log('- Locked Box + Small Rusty Key: Should unlock and give Sharpened Bone Dagger');
  console.log('- Chest + Lockpick: Should attempt lockpicking with skill check');
  console.log('- Locked Box without key: Should show "need key or lockpick" message');
}

createTestCharacter();
