export interface Spellbook {
  id?: string;
  charname: string; // Legacy field name from old demo

  // Basic spell information
  spellname: string;
  spelldescription: string;
  spelltype: string; // Combat, Healing, Utility, etc.
  spellimage: string; // Image filename without extension
  spelllevel: number;
  spellrarity: string; // Common, Uncommon, Rare, Epic, Legendary

  // Spell properties
  manacost: number;
  cooldown: number;
  casttime: number;
  range: number;
  duration: number;

  // Spell effects
  damage: number;
  healing: number;
  buff: number;
  debuff: number;

  // Elemental properties
  fire: number; // Fire damage/healing
  ice: number; // Ice damage/healing
  lightning: number; // Lightning damage/healing
  earth: number; // Earth damage/healing
  air: number; // Air damage/healing
  light: number; // Light damage/healing
  dark: number; // Dark damage/healing

  // Status effects
  stun: number; // Stun duration
  paralyze: number; // Paralyze duration
  poison: number; // Poison damage
  poisoncount: number; // Poison duration
  sleep: number; // Sleep duration
  fear: number; // Fear duration
  silence: number; // Silence duration
  blind: number; // Blind duration

  // Buff effects
  strength: number; // Strength bonus
  agility: number; // Agility bonus
  wisdom: number; // Wisdom bonus
  speed: number; // Speed bonus
  accuracy: number; // Accuracy bonus
  luck: number; // Luck bonus

  // Resistance effects
  fireresist: number; // Fire resistance
  iceresist: number; // Ice resistance
  lightningresist: number; // Lightning resistance
  earthresist: number; // Earth resistance
  airresist: number; // Air resistance
  lightresist: number; // Light resistance
  darkresist: number; // Dark resistance
  poisonresist: number; // Poison resistance
  mindresist: number; // Mind resistance

  // Special effects
  invisibility: number; // Invisibility duration
  levitation: number; // Levitation duration
  teleport: number; // Teleport distance
  summon: number; // Summon creature level
  shield: number; // Shield strength
  reflect: number; // Reflect chance

  // Combat effects
  critical: number; // Critical hit chance
  backstab: number; // Backstab damage
  bleed: number; // Bleed damage
  bleedcount: number; // Bleed duration
  knockback: number; // Knockback distance
  lifesteal: number; // Life steal percentage
  manasteal: number; // Mana steal percentage

  // Utility effects
  lockpicking: number; // Lockpicking bonus
  magicfind: number; // Magic find bonus
  experience: number; // Experience bonus
  gold: number; // Gold bonus

  // Spell requirements
  requiredlevel: number;
  requiredstrength: number;
  requiredagility: number;
  requiredwisdom: number;
  requiredmagic: number;

  // Spell categories
  school: string; // Fire, Ice, Nature, etc.
  target: string; // Self, Single, Area, etc.
  component: string; // Verbal, Somatic, Material

  // Spell flags
  learned: number; // 1 if learned, 0 if not
  memorized: number; // 1 if memorized, 0 if not
  prepared: number; // 1 if prepared, 0 if not

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}

// Default spellbook values for new characters
export const DEFAULT_SPELLBOOK: Omit<Spellbook, 'charname'> = {
  spellname: '',
  spelldescription: '',
  spelltype: '',
  spellimage: '',
  spelllevel: 0,
  spellrarity: 'Common',
  manacost: 0,
  cooldown: 0,
  casttime: 0,
  range: 0,
  duration: 0,
  damage: 0,
  healing: 0,
  buff: 0,
  debuff: 0,
  fire: 0,
  ice: 0,
  lightning: 0,
  earth: 0,
  air: 0,
  light: 0,
  dark: 0,
  stun: 0,
  paralyze: 0,
  poison: 0,
  poisoncount: 0,
  sleep: 0,
  fear: 0,
  silence: 0,
  blind: 0,
  strength: 0,
  agility: 0,
  wisdom: 0,
  speed: 0,
  accuracy: 0,
  luck: 0,
  fireresist: 0,
  iceresist: 0,
  lightningresist: 0,
  earthresist: 0,
  airresist: 0,
  lightresist: 0,
  darkresist: 0,
  poisonresist: 0,
  mindresist: 0,
  invisibility: 0,
  levitation: 0,
  teleport: 0,
  summon: 0,
  shield: 0,
  reflect: 0,
  critical: 0,
  backstab: 0,
  bleed: 0,
  bleedcount: 0,
  knockback: 0,
  lifesteal: 0,
  manasteal: 0,
  lockpicking: 0,
  magicfind: 0,
  experience: 0,
  gold: 0,
  requiredlevel: 0,
  requiredstrength: 0,
  requiredagility: 0,
  requiredwisdom: 0,
  requiredmagic: 0,
  school: '',
  target: '',
  component: '',
  learned: 0,
  memorized: 0,
  prepared: 0,
  createdAt: Date.now(),
  updatedAt: Date.now()
};
