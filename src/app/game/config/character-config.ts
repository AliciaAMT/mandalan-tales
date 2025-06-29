// Character creation configuration based on the old demo
// This contains all the race and class bonuses that were documented in the original game

export interface RaceBonus {
  name: string;
  description: string;
  bonuses: {
    strength?: number;
    speed?: number;
    agility?: number;
    accuracy?: number;
    wisdom?: number;
    life?: number;
    maxLife?: number;
    mana?: number;
    maxMana?: number;
    fireResist?: number;
    iceResist?: number;
    airResist?: number;
    earthResist?: number;
    lightResist?: number;
    darkResist?: number;
    poisonResist?: number;
    mindResist?: number;
    holdResist?: number;
    criticalResist?: number;
    bleedResist?: number;
    magicFind?: number;
  };
}

export interface ClassBonus {
  name: string;
  description: string;
  bonuses: {
    strength?: number;
    accuracy?: number;
    speed?: number;
    agility?: number;
    wisdom?: number;
    mana?: number;
    maxMana?: number;
    fireResist?: number;
    iceResist?: number;
    airResist?: number;
    earthResist?: number;
    lightResist?: number;
    darkResist?: number;
    mindResist?: number;
    holdResist?: number;
    criticalResist?: number;
    skillPoints?: number;
    lockpicking?: number;
    enchanting?: number;
    alchemy?: number;
  };
}

export const RACE_BONUSES: RaceBonus[] = [
  {
    name: 'Human',
    description: '+5 Life, +25 Magicfind',
    bonuses: {
      life: 5,
      maxLife: 5,
      magicFind: 25
    }
  },
  {
    name: 'Half-Elf',
    description: 'strength-3, speed+3, agility+3, accuracy+3, wisdom+3, life+2, fireresist+1, iceresist+1, lightresist+1, darkresist+1, poisonresist+1, earthresist+1, magicfind+10',
    bonuses: {
      strength: -3,
      speed: 3,
      agility: 3,
      accuracy: 3,
      wisdom: 3,
      life: 2,
      maxLife: 2,
      fireResist: 1,
      iceResist: 1,
      lightResist: 1,
      darkResist: 1,
      poisonResist: 1,
      earthResist: 1,
      magicFind: 10
    }
  },
  {
    name: 'Dark-Elf',
    description: 'strength-5, speed+5, agility+5, accuracy+5, wisdom+5, fireresist+2, iceresist+2, lightresist-5, darkresist+5, poisonresist+2',
    bonuses: {
      strength: -5,
      speed: 5,
      agility: 5,
      accuracy: 5,
      wisdom: 5,
      fireResist: 2,
      iceResist: 2,
      lightResist: -5,
      darkResist: 5,
      poisonResist: 2
    }
  },
  {
    name: 'Light-Elf',
    description: 'strength-5, speed+5, agility+5, accuracy+5, wisdom+5, fireresist+2, iceresist+2, lightresist+5, darkresist-5, poisonresist+2',
    bonuses: {
      strength: -5,
      speed: 5,
      agility: 5,
      accuracy: 5,
      wisdom: 5,
      fireResist: 2,
      iceResist: 2,
      lightResist: 5,
      darkResist: -5,
      poisonResist: 2
    }
  },
  {
    name: 'Wood-Elf',
    description: 'strength-5, speed+5, agility+5, accuracy+5, wisdom+5, fireresist+5, iceresist+5, lightresist+2, darkresist+2, poisonresist+2',
    bonuses: {
      strength: -5,
      speed: 5,
      agility: 5,
      accuracy: 5,
      wisdom: 5,
      fireResist: 5,
      iceResist: 5,
      lightResist: 2,
      darkResist: 2,
      poisonResist: 2
    }
  },
  {
    name: 'Dwarf',
    description: 'life+10, speed-3, strength+5, agility-3, fireresist+3, criticalresist+3, bleedresist+3',
    bonuses: {
      life: 10,
      maxLife: 10,
      speed: -3,
      strength: 5,
      agility: -3,
      fireResist: 3,
      criticalResist: 3,
      bleedResist: 3
    }
  },
  {
    name: 'Half-Giant',
    description: 'life+15, strength+7, speed-3, agility-5, holdresist+7, mindresist-5, wisdom-5',
    bonuses: {
      life: 15,
      maxLife: 15,
      strength: 7,
      speed: -3,
      agility: -5,
      holdResist: 7,
      mindResist: -5,
      wisdom: -5
    }
  }
];

export const CLASS_BONUSES: ClassBonus[] = [
  {
    name: 'Knight',
    description: 'strength+7, accuracy+7, speed+2, criticalresist+5, skillpoints+7',
    bonuses: {
      strength: 7,
      accuracy: 7,
      speed: 2,
      criticalResist: 5,
      skillPoints: 7
    }
  },
  {
    name: 'Paladin',
    description: 'strength+5, accuracy+3, speed+1, criticalresist+5, skillpoints+3, wisdom+3, darkresist+5, mana+5',
    bonuses: {
      strength: 5,
      accuracy: 3,
      speed: 1,
      criticalResist: 5,
      skillPoints: 3,
      wisdom: 3,
      darkResist: 5,
      mana: 5,
      maxMana: 5
    }
  },
  {
    name: 'Ninja',
    description: 'strength+5, accuracy+5, speed+5, skillpoints+3, wisdom+2, agility+5, fireresist+5, iceresist+5',
    bonuses: {
      strength: 5,
      accuracy: 5,
      speed: 5,
      skillPoints: 3,
      wisdom: 2,
      agility: 5,
      fireResist: 5,
      iceResist: 5
    }
  },
  {
    name: 'Mystic',
    description: 'wisdom+10, mindresist+10, lightresist+5, darkresist+5, skillpoints+5, mana+15, enchanting+25',
    bonuses: {
      wisdom: 10,
      mindResist: 10,
      lightResist: 5,
      darkResist: 5,
      skillPoints: 5,
      mana: 15,
      maxMana: 15,
      enchanting: 25
    }
  },
  {
    name: 'Rogue',
    description: 'speed+7, accuracy+5, agility+7, wisdom+2, holdresist+5, skillpoints+5, lockpicking+25',
    bonuses: {
      speed: 7,
      accuracy: 5,
      agility: 7,
      wisdom: 2,
      holdResist: 5,
      skillPoints: 5,
      lockpicking: 25
    }
  },
  {
    name: 'Shaman',
    description: 'wisdom+10, fireresist+10, iceresist+10, skillpoints+3, mana+15, earthresist+10, alchemy+25',
    bonuses: {
      wisdom: 10,
      fireResist: 10,
      iceResist: 10,
      skillPoints: 3,
      mana: 15,
      maxMana: 15,
      earthResist: 10,
      alchemy: 25
    }
  }
];

// Helper functions to get bonuses by name
export function getRaceBonus(raceName: string): RaceBonus | undefined {
  return RACE_BONUSES.find(race => race.name === raceName);
}

export function getClassBonus(className: string): ClassBonus | undefined {
  return CLASS_BONUSES.find(cls => cls.name === className);
}

// Default character values from the old demo
export const DEFAULT_CHARACTER_VALUES = {
  // Base stats (randomly generated 10-15)
  baseLife: 50,
  baseMaxLife: 50,
  baseMana: 30,
  baseMaxMana: 30,
  baseSpeed: { min: 10, max: 15 },
  baseAccuracy: { min: 10, max: 15 },
  baseStrength: { min: 10, max: 15 },
  baseAgility: { min: 10, max: 15 },
  baseWisdom: { min: 10, max: 15 },
  baseLuck: { min: 10, max: 15 },

  // Base resistances (randomly generated 0-10)
  baseFireResist: { min: 0, max: 10 },
  baseIceResist: { min: 0, max: 10 },
  baseAirResist: { min: 0, max: 10 },
  baseEarthResist: { min: 0, max: 10 },
  baseLightResist: { min: 0, max: 10 },
  baseDarkResist: { min: 0, max: 10 },
  basePoisonResist: { min: 0, max: 10 },
  baseMindResist: { min: 0, max: 10 },
  baseHoldResist: { min: 0, max: 10 },
  baseCriticalResist: { min: 0, max: 10 },
  baseBleedResist: { min: 0, max: 10 },

  // Base skills
  baseSkillPoints: 5,
  baseMagicFind: 0,
  baseLockpicking: 0,
  baseCooking: { min: 0, max: 10 },
  baseAlchemy: 0,
  baseEnchanting: 0,

  // Default character status
  defaultGuild: 'None',
  defaultTitle: 'Peasant',
  defaultCondition: 'Good',

  // Default map and position
  defaultMap: 'homeup',
  defaultMapDimensions: 33,
  defaultXAxis: 2,
  defaultYAxis: 2,
  defaultSaveMap: 'homeup',
  defaultSaveMapDimensions: 33,
  defaultSaveXAxis: 1,
  defaultSaveYAxis: 3
};
