export interface Inventory {
  id?: string;
  charname: string; // Legacy field name from old demo

  // Basic item information
  itemname: string;
  itemdescription: string;
  itemtype: string; // Weapon, Armor, Food, Potion, etc.
  itemimage: string; // Image filename without extension
  itemlevel: number;
  itemrarity: string; // Common, Uncommon, Rare, Epic, Legendary
  itemvalue: number; // Gold value

  // Item quantities and flags
  keep: number; // Quantity owned
  trade: number; // Can be traded (0/1)
  equip: number; // Is equipped (0/1)
  equiplocation: string; // Where equipped (head, chest, etc.)
  equiplh: number; // Equipped left hand (0/1)
  equiprh: number; // Equipped right hand (0/1)

  // Item properties
  waterunits: number; // Current water units
  maxwater: number; // Maximum water units
  locklevel: number; // Lock difficulty
  keylock: number; // Requires specific key (0/1)
  readable: number; // Can be read (0/1)
  consumable: number; // Can be consumed (0/1)
  equipable: number; // Can be equipped (0/1)
  combatuse: number; // Can be used in combat (0/1)
  singleuse: number; // Single use item (0/1)

  // Item types
  weapontype: string; // Sword, Axe, Bow, etc.
  armortype: string; // Light, Medium, Heavy
  acctype: string; // Ring, Amulet, etc.
  othertype: string; // Tool, Reagent, etc.

  // Base stats
  weaponbase: number;
  armorbase: number;
  accbase: number;

  // Enhancements and enchantments
  enhancement1: string;
  enhancement2: string;
  enhancement3: string;
  enchantment1: string;
  enchantment2: string;
  enchantment3: string;
  transmute1: string;
  transmute2: string;
  transmute3: string;

  // Item flags
  adjustable: number; // Can be adjusted (0/1)
  legendary: number; // Is legendary (0/1)
  relic: number; // Is relic (0/1)
  setitem: number; // Part of a set (0/1)

  // Combat stats
  damage: number;
  defense: number;
  penalty: number;

  // Special effects
  lightsource: number; // Provides light (0/1)
  thieving: number; // Thieving bonus
  slow: number; // Slows movement (0/1)
  curse: number; // Is cursed (0/1)
  debility: number; // Causes debility (0/1)
  weaken: number; // Weakens target (0/1)
  acid: number; // Acid damage (0/1)
  acidcount: number; // Acid duration
  sleep: number; // Sleep effect (0/1)
  sleepcount: number; // Sleep duration
  disease: number; // Disease effect (0/1)
  blindness: number; // Blindness effect (0/1)
  expbonus: number; // Experience bonus
  invisible: number; // Invisibility (0/1)

  // Elemental effects
  fire: number; // Fire damage
  fireresist: number; // Fire resistance
  ice: number; // Ice damage
  iceresist: number; // Ice resistance
  lightning: number; // Lightning damage
  lightningresist: number; // Lightning resistance
  earth: number; // Earth damage
  earthresist: number; // Earth resistance
  dark: number; // Dark damage
  darkresist: number; // Dark resistance
  light: number; // Light damage
  lightresist: number; // Light resistance

  // Combat effects
  bleedresist: number; // Bleed resistance
  knockback: number; // Knockback effect
  criticalhit: number; // Critical hit chance
  backstab: number; // Backstab damage
  doublestrike: number; // Double strike chance
  triplestrike: number; // Triple strike chance
  catapult: number; // Catapult effect
  bleed: number; // Bleed damage
  bleedcount: number; // Bleed duration
  physdamage: number; // Physical damage

  // Reflection effects
  reflectphys: number; // Reflect physical damage
  reflectfire: number; // Reflect fire damage
  reflectice: number; // Reflect ice damage
  reflectair: number; // Reflect air damage
  reflectearth: number; // Reflect earth damage
  reflectlight: number; // Reflect light damage
  reflectdark: number; // Reflect dark damage

  // Special abilities
  vampiric: number; // Vampiric effect (0/1)
  vampamount: number; // Vampiric amount
  manadrain: number; // Mana drain (0/1)
  drainamount: number; // Drain amount
  duality: number; // Duality effect (0/1)
  lightness: number; // Lightness effect (0/1)
  longarm: number; // Long arm effect (0/1)
  throwing: number; // Throwing weapon (0/1)

  // Ultimate effects
  ultimateresist: number; // Ultimate resistance
  ultimatedamage: number; // Ultimate damage
  ultimateboost: number; // Ultimate boost

  // Stat bonuses
  strength: number; // Strength bonus
  speed: number; // Speed bonus
  accuracy: number; // Accuracy bonus
  agility: number; // Agility bonus
  wisdom: number; // Wisdom bonus
  life: number; // Life bonus
  mana: number; // Mana bonus

  // Regeneration
  liferegen: number; // Life regeneration
  manaregen: number; // Mana regeneration

  // Status effects
  blocking: number; // Blocking chance
  petrify: number; // Petrify effect (0/1)
  paralyze: number; // Paralyze effect (0/1)
  stun: number; // Stun effect (0/1)
  fear: number; // Fear effect (0/1)
  insanity: number; // Insanity effect (0/1)

  // Special abilities
  lightfoot: number; // Light foot effect (0/1)
  revivingjolt: number; // Reviving jolt (0/1)
  refillinglight: number; // Refilling light (0/1)
  despair: number; // Despair effect (0/1)
  tremors: number; // Tremors effect (0/1)
  inferno: number; // Inferno effect (0/1)
  infernocount: number; // Inferno duration
  freezing: number; // Freezing effect (0/1)
  freezecount: number; // Freezing duration

  // Utility effects
  magicfind: number; // Magic find bonus
  greed: number; // Greed effect (0/1)
  luck: number; // Luck bonus
  lockpicking: number; // Lockpicking bonus
  firestarter: number; // Fire starter (0/1)
  heroicboost: number; // Heroic boost (0/1)
  heroiccount: number; // Heroic boost duration
  silence: number; // Silence effect (0/1)
  antique: number; // Antique item (0/1)

  // Environmental effects
  webs: number; // Web effect (0/1)
  entanglement: number; // Entanglement (0/1)
  waterbreathe: number; // Water breathing (0/1)
  lasso: number; // Lasso effect (0/1)

  // Combat abilities
  adrenalinerush: number; // Adrenaline rush (0/1)
  adrenalinecount: number; // Adrenaline duration
  distraction: number; // Distraction effect (0/1)

  // Resistances
  immobilizeresist: number; // Immobilize resistance
  mindresist: number; // Mind resistance
  criticalresist: number; // Critical resistance

  // Special effects
  horrifying: number; // Horrifying effect (0/1)
  ultimaterevive: number; // Ultimate revive (0/1)
  swarming: number; // Swarming effect (0/1)
  dryice: number; // Dry ice effect (0/1)
  coldblood: number; // Cold blood effect (0/1)
  raginginferno: number; // Raging inferno (0/1)
  smoke: number; // Smoke effect (0/1)

  // Weapon properties
  levelling: number; // Leveling weapon (0/1)
  piercing: number; // Piercing damage
  sharpened: number; // Sharpened weapon (0/1)
  keen: number; // Keen weapon (0/1)
  devastating: number; // Devastating weapon (0/1)
  crushing: number; // Crushing weapon (0/1)
  itemrange: number; // Item range
  itemspeed: number; // Item speed

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}

// Default inventory values for new characters
export const DEFAULT_INVENTORY: Omit<Inventory, 'charname'> = {
  itemname: '',
  itemdescription: '',
  itemtype: '',
  itemimage: '',
  itemlevel: 0,
  itemrarity: 'Common',
  itemvalue: 0,
  keep: 0,
  trade: 0,
  equip: 0,
  equiplocation: '',
  equiplh: 0,
  equiprh: 0,
  waterunits: 0,
  maxwater: 0,
  locklevel: 0,
  keylock: 0,
  readable: 0,
  consumable: 0,
  equipable: 0,
  combatuse: 0,
  singleuse: 0,
  weapontype: '',
  armortype: '',
  acctype: '',
  othertype: '',
  weaponbase: 0,
  armorbase: 0,
  accbase: 0,
  enhancement1: 'None',
  enhancement2: 'None',
  enhancement3: 'None',
  enchantment1: 'None',
  enchantment2: 'None',
  enchantment3: 'None',
  transmute1: 'None',
  transmute2: 'None',
  transmute3: 'None',
  adjustable: 0,
  legendary: 0,
  relic: 0,
  setitem: 0,
  damage: 0,
  defense: 0,
  penalty: 0,
  lightsource: 0,
  thieving: 0,
  slow: 0,
  curse: 0,
  debility: 0,
  weaken: 0,
  acid: 0,
  acidcount: 0,
  sleep: 0,
  sleepcount: 0,
  disease: 0,
  blindness: 0,
  expbonus: 0,
  invisible: 0,
  fire: 0,
  fireresist: 0,
  ice: 0,
  iceresist: 0,
  lightning: 0,
  lightningresist: 0,
  earth: 0,
  earthresist: 0,
  dark: 0,
  darkresist: 0,
  light: 0,
  lightresist: 0,
  bleedresist: 0,
  knockback: 0,
  criticalhit: 0,
  backstab: 0,
  doublestrike: 0,
  triplestrike: 0,
  catapult: 0,
  bleed: 0,
  bleedcount: 0,
  physdamage: 0,
  reflectphys: 0,
  reflectfire: 0,
  reflectice: 0,
  reflectair: 0,
  reflectearth: 0,
  reflectlight: 0,
  reflectdark: 0,
  vampiric: 0,
  vampamount: 0,
  manadrain: 0,
  drainamount: 0,
  duality: 0,
  lightness: 0,
  longarm: 0,
  throwing: 0,
  ultimateresist: 0,
  ultimatedamage: 0,
  ultimateboost: 0,
  strength: 0,
  speed: 0,
  accuracy: 0,
  agility: 0,
  wisdom: 0,
  life: 0,
  mana: 0,
  liferegen: 0,
  manaregen: 0,
  blocking: 0,
  petrify: 0,
  paralyze: 0,
  stun: 0,
  fear: 0,
  insanity: 0,
  lightfoot: 0,
  revivingjolt: 0,
  refillinglight: 0,
  despair: 0,
  tremors: 0,
  inferno: 0,
  infernocount: 0,
  freezing: 0,
  freezecount: 0,
  magicfind: 0,
  greed: 0,
  luck: 0,
  lockpicking: 0,
  firestarter: 0,
  heroicboost: 0,
  heroiccount: 0,
  silence: 0,
  antique: 0,
  webs: 0,
  entanglement: 0,
  waterbreathe: 0,
  lasso: 0,
  adrenalinerush: 0,
  adrenalinecount: 0,
  distraction: 0,
  immobilizeresist: 0,
  mindresist: 0,
  criticalresist: 0,
  horrifying: 0,
  ultimaterevive: 0,
  swarming: 0,
  dryice: 0,
  coldblood: 0,
  raginginferno: 0,
  smoke: 0,
  levelling: 0,
  piercing: 0,
  sharpened: 0,
  keen: 0,
  devastating: 0,
  crushing: 0,
  itemrange: 0,
  itemspeed: 0,
  createdAt: Date.now(),
  updatedAt: Date.now()
};
