// Loot table logic mimicking the old PHP demo

export type LootRarity = 'Legendary' | 'Ultra-Rare' | 'Rare' | 'Uncommon' | 'Common';
export type LootType = 'Weapon' | 'Accessory' | 'Armor' | 'Consumable' | 'Other';

export interface LootItem {
  name: string;
  description: string;
  type: LootType;
  image: string;
  rarity: LootRarity;
  level: number;
  value: number;
  [key: string]: any;
}

// --- Rarity Roll Logic (mimics randitem1.php) ---
export function rollRarity(magicFind = 0): LootRarity {
  let rand = Math.floor(Math.random() * 150) + 1;
  rand = rand - magicFind;
  if (rand < 5) return 'Legendary';
  if (rand < 15) return 'Ultra-Rare';
  if (rand < 25) return 'Rare';
  if (rand < 50) return 'Uncommon';
  return 'Common';
}

// --- Gold Table by Rarity ---
export function rollGold(rarity: LootRarity): number {
  switch (rarity) {
    case 'Legendary': return rollDice(10, 6);
    case 'Ultra-Rare': return rollDice(5, 6);
    case 'Rare': return rollDice(3, 6);
    case 'Uncommon': return rollDice(2, 6);
    case 'Common':
    default: return rollDice(1, 6);
  }
}

function rollDice(num: number, sides: number): number {
  let total = 0;
  for (let i = 0; i < num; i++) {
    total += Math.floor(Math.random() * sides) + 1;
  }
  return total;
}

// --- Item Pools by Rarity/Type (based on getitemtype.php, simplified for now) ---
const itemPools: Record<LootRarity, LootItem[]> = {
  'Legendary': [
    {
      name: 'Belt of the Warrior',
      description: "Stories revolve around this legendary belt. It is said it has special powers that enhance a person's life force as well as their mind.",
      type: 'Accessory',
      image: 'beltowar',
      rarity: 'Legendary',
      level: 5,
      value: 7500000,
      enhancement1: 'Adds to Life Force.',
      enhancement2: "Adds to Mind's Force.",
      equiplocation: 'Waist',
      acctype: 'Belt',
      legendary: 1
    }
    // Add more legendary items as needed
  ],
  'Ultra-Rare': [
    {
      name: 'Enchanted Dirk',
      description: 'A rare dirk with magical properties.',
      type: 'Weapon',
      image: 'dirk',
      rarity: 'Ultra-Rare',
      level: 4,
      value: 1200,
      enhancement1: 'Magic Damage +5',
      weapontype: 'Blade',
      equiplocation: 'Weapon',
      equipable: 1
    }
    // Add more ultra-rare items as needed
  ],
  'Rare': [
    {
      name: 'Dagger',
      description: 'This Dagger looks dangerous!',
      type: 'Weapon',
      image: 'dagger',
      rarity: 'Rare',
      level: 3,
      value: 900,
      weapontype: 'Blade',
      equiplocation: 'Weapon',
      equipable: 1
    }
    // Add more rare items as needed
  ],
  'Uncommon': [
    {
      name: 'Short Sword',
      description: 'This short sword looks dangerous!',
      type: 'Weapon',
      image: 'shortsword',
      rarity: 'Uncommon',
      level: 2,
      value: 400,
      weapontype: 'Blade',
      equiplocation: 'Weapon',
      equipable: 1
    }
    // Add more uncommon items as needed
  ],
  'Common': [
    {
      name: 'Rusted Knife',
      description: "This kitchen knife is quite rusty. It won't do much damage, but it is a weapon nonetheless.",
      type: 'Weapon',
      image: 'rustedknife',
      rarity: 'Common',
      level: 1,
      value: 25,
      weapontype: 'Blade',
      equiplocation: 'Weapon',
      equipable: 1
    },
    {
      name: 'Branch',
      description: 'A simple branch, can be used as a staff.',
      type: 'Weapon',
      image: 'branch',
      rarity: 'Common',
      level: 1,
      value: 10,
      weapontype: 'Staff/Wand',
      equiplocation: 'Weapon',
      equipable: 1
    }
    // Add more common items as needed
  ]
};

// --- Main Loot Roll Function ---
export function rollLoot(contentType: string, magicFind = 0): LootItem | number | null {
  if (contentType === 'gold') {
    const rarity = rollRarity(magicFind);
    return rollGold(rarity);
  }
  if (contentType === 'random') {
    const rarity = rollRarity(magicFind);
    const pool = itemPools[rarity];
    if (!pool || pool.length === 0) return null;
    const idx = Math.floor(Math.random() * pool.length);
    return pool[idx];
  }
  return null;
}
