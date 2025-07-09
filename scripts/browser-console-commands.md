# Browser Console Commands for Testing

## Quick Reset Commands
Run these in your browser's developer console:

### Clear all game-related localStorage
```javascript
// Clear all rug, chest, pantry, and herb rack flags
Object.keys(localStorage).forEach(key => {
  if (key.includes('rug_') || key.includes('chest_') || key.includes('pantry_') || key.includes('herbrack_')) {
    localStorage.removeItem(key);
    console.log('Removed:', key);
  }
});
```

### Clear everything and reload
```javascript
// Nuclear option - clear everything and reload
localStorage.clear();
sessionStorage.clear();
location.reload();
```

### Create a test character (if you have access to the app's services)
```javascript
// This would work if you can access the app's services from console
// (You'd need to expose them globally for testing)
if (window.characterService) {
  window.characterService.createCharacter({
    name: 'TestChar',
    email: 'test@example.com'
  });
}
```

## Quick Test Character Data
```javascript
// Copy this into console to see what a fresh character looks like
const testChar = {
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
  luck: 10
};
console.log('Test character data:', testChar);
``` 
