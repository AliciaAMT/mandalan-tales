# Locked Box Implementation

This document describes the implementation of locked box functionality in the Ionic Angular app, based on the original PHP demo.

## Overview

The locked box system allows players to unlock containers using keys or lockpicks, with different containers requiring specific keys or allowing lockpicking attempts.

## Key Features

### 1. Key-Based Unlocking
- **Locked Box**: Requires "Small Rusty Key" to unlock
- **Chest**: Can be unlocked with "Chest Key" or lockpicked
- **Generic Containers**: Can use "Key" or "Generic Key"

### 2. Lockpicking System
- Requires "Lockpick" item in inventory
- Uses character skills: `lockpicking + blockpicking + level + luck + bluck + bthieving`
- Random roll (1-20) determines success/failure
- Failed attempts break the lockpick
- Successful attempts consume the lockpick

### 3. Specific Container Logic

#### Locked Box
- **Key Required**: "Small Rusty Key"
- **Reward**: "Sharpened Bone Dagger" (Level 1 Relic Weapon)
- **Experience**: +5 XP
- **Quest**: "The Hidden Key Quest" completion

#### Chest
- **Lockpicking**: Available with lockpick
- **Reward**: "Family Crest Amulet" (Level 1 Relic Accessory)
- **Experience**: +5 XP
- **Quest**: "The Family Crest Quest" update

## Implementation Details

### Inventory Service Methods

```typescript
// Check if player has a specific key
hasKey(keyName: string): boolean

// Check if player has lockpicks
hasLockpick(): boolean

// Attempt to unlock with key
unlockWithKey(containerItem: Inventory, keyName: string): Promise<{ success: boolean; message: string; items?: any[] }>

// Attempt to lockpick
lockpickContainer(containerItem: Inventory): Promise<{ success: boolean; message: string; items?: any[] }>
```

### Character Skills Used for Lockpicking

The lockpicking skill calculation uses:
- `lockpicking` (base skill)
- `blockpicking` (bonus skill)
- `level` (character level)
- `luck` (luck stat)
- `bluck` (bonus luck)
- `bthieving` (bonus thieving)

### UI Flow

1. **Item Details Modal**: Shows "Unlock" button for locked containers
2. **Container Modal**: Shows options based on available keys/lockpicks
3. **Success/Failure Messages**: Modal alerts show results
4. **Inventory Updates**: Items are automatically added/removed

## Testing

### Test Items
- **Locked Box**: `lockedbox` image
- **Small Rusty Key**: `smallrustykey` image
- **Lockpick**: `lockpick` image
- **Chest**: `chest` image

### Test Scenarios
1. **Locked Box + Key**: Should unlock and give Sharpened Bone Dagger
2. **Chest + Lockpick**: Should attempt lockpicking with skill check
3. **Locked Box without key**: Should show "need key or lockpick" message
4. **Failed lockpick**: Should break lockpick and show failure message

## File Structure

- `src/app/game/services/inventory.service.ts`: Core unlock logic
- `src/app/game/pages/inventory/inventory.page.ts`: UI handling
- `src/app/game/pages/inventory/container-modal.component.ts`: Container modal
- `src/app/game/models/inventory.model.ts`: Data model

## Future Enhancements

- Add more container types with specific keys
- Implement lockpicking skill training
- Add lockpicking tools with different success rates
- Create quest chains around key collection
- Add sound effects for unlock/lockpick actions 
