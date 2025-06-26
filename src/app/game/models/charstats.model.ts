export interface CharStats {
  id?: string; // Firestore document ID
  userId: string; // Firebase UID or user ref

  name: string;
  portrait: string;
  race: string;
  class: string;
  gender: string;

  level: number;
  experience: number;
  skillPoints: number;

  life: number;
  maxLife: number;
  mana: number;
  maxMana: number;

  speed: number;
  accuracy: number;
  strength: number;
  agility: number;
  wisdom: number;
  luck: number;

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

  cooking: number;
  alchemy: number;
  enchanting: number;
  lockpicking: number;
  magicFind: number;

  createdAt?: any;
  updatedAt?: any;
}
