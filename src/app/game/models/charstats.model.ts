export interface CharStats {
  id?: string; // Added automatically by Firestore query with { idField: 'id' }
  userId: string; // Firebase UID or user ref

  name: string;
  portrait: string;
  race: string;
  class: string;
  gender: string;

  // Character status
  guild: string;
  title: string;
  cond: string; // condition (Good, etc.)

  // Level and experience
  level: number;
  experience: number;
  skillPoints: number;

  // Health and mana
  life: number;
  maxLife: number;
  mana: number;
  maxMana: number;

  // Core stats
  speed: number;
  accuracy: number;
  strength: number;
  agility: number;
  wisdom: number;
  luck: number;

  // Resistances
  fireResist: number;
  iceResist: number;
  airResist: number;
  earthResist: number;
  lightResist: number;
  darkResist: number;
  poisonResist: number;
  mindResist: number;
  holdResist: number;
  criticalResist: number;
  bleedResist: number;

  // Skills
  cooking: number;
  alchemy: number;
  enchanting: number;
  lockpicking: number;
  magicFind: number;

  // Map and position
  map: string;
  mapdimensions: number;
  xaxis: number;
  yaxis: number;
  savemap: string;
  savemapdimensions: number;
  savexaxis: number;
  saveyaxis: number;

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}
