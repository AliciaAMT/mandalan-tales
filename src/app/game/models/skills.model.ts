export interface Skills {
  id?: string;
  charname: string; // Legacy field name from old demo

  // Combat skills
  swordfighting: number;
  archery: number;
  magic: number;
  healing: number;
  stealth: number;

  // Crafting skills
  blacksmithing: number;
  woodworking: number;
  leatherworking: number;
  cooking: number;
  alchemy: number;
  enchanting: number;

  // Utility skills
  lockpicking: number;
  magicfind: number;
  thieving: number;
  survival: number;
  diplomacy: number;

  // Specialized skills
  firemagic: number;
  icemagic: number;
  earthmagic: number;
  airmagic: number;
  lightmagic: number;
  darkmagic: number;

  // Weapon skills
  sword: number;
  axe: number;
  mace: number;
  dagger: number;
  bow: number;
  crossbow: number;
  staff: number;
  wand: number;

  // Armor skills
  lightarmor: number;
  mediumarmor: number;
  heavyarmor: number;
  shield: number;

  // Additional skills (from old demo structure)
  skill1?: number;
  skill2?: number;
  skill3?: number;
  skill4?: number;
  skill5?: number;
  skill6?: number;
  skill7?: number;
  skill8?: number;
  skill9?: number;
  skill10?: number;
  skill11?: number;
  skill12?: number;
  skill13?: number;
  skill14?: number;
  skill15?: number;
  skill16?: number;
  skill17?: number;
  skill18?: number;
  skill19?: number;
  skill20?: number;
  skill21?: number;
  skill22?: number;
  skill23?: number;
  skill24?: number;
  skill25?: number;
  skill26?: number;
  skill27?: number;
  skill28?: number;
  skill29?: number;
  skill30?: number;
  skill31?: number;
  skill32?: number;
  skill33?: number;
  skill34?: number;
  skill35?: number;
  skill36?: number;
  skill37?: number;
  skill38?: number;
  skill39?: number;
  skill40?: number;
  skill41?: number;
  skill42?: number;
  skill43?: number;
  skill44?: number;
  skill45?: number;
  skill46?: number;
  skill47?: number;
  skill48?: number;
  skill49?: number;
  skill50?: number;

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}

// Default skills values for new characters
export const DEFAULT_SKILLS: Omit<Skills, 'charname'> = {
  swordfighting: 0,
  archery: 0,
  magic: 0,
  healing: 0,
  stealth: 0,
  blacksmithing: 0,
  woodworking: 0,
  leatherworking: 0,
  cooking: 0,
  alchemy: 0,
  enchanting: 0,
  lockpicking: 0,
  magicfind: 0,
  thieving: 0,
  survival: 0,
  diplomacy: 0,
  firemagic: 0,
  icemagic: 0,
  earthmagic: 0,
  airmagic: 0,
  lightmagic: 0,
  darkmagic: 0,
  sword: 0,
  axe: 0,
  mace: 0,
  dagger: 0,
  bow: 0,
  crossbow: 0,
  staff: 0,
  wand: 0,
  lightarmor: 0,
  mediumarmor: 0,
  heavyarmor: 0,
  shield: 0,
  skill1: 0,
  skill2: 0,
  skill3: 0,
  skill4: 0,
  skill5: 0,
  skill6: 0,
  skill7: 0,
  skill8: 0,
  skill9: 0,
  skill10: 0,
  skill11: 0,
  skill12: 0,
  skill13: 0,
  skill14: 0,
  skill15: 0,
  skill16: 0,
  skill17: 0,
  skill18: 0,
  skill19: 0,
  skill20: 0,
  skill21: 0,
  skill22: 0,
  skill23: 0,
  skill24: 0,
  skill25: 0,
  skill26: 0,
  skill27: 0,
  skill28: 0,
  skill29: 0,
  skill30: 0,
  skill31: 0,
  skill32: 0,
  skill33: 0,
  skill34: 0,
  skill35: 0,
  skill36: 0,
  skill37: 0,
  skill38: 0,
  skill39: 0,
  skill40: 0,
  skill41: 0,
  skill42: 0,
  skill43: 0,
  skill44: 0,
  skill45: 0,
  skill46: 0,
  skill47: 0,
  skill48: 0,
  skill49: 0,
  skill50: 0,
  createdAt: Date.now(),
  updatedAt: Date.now()
};
