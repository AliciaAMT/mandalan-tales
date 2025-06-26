export interface Enemy {
  id?: string;

  name: string;
  level: number;

  life: number;
  maxLife: number;
  mana: number;
  maxMana: number;

  strength: number;
  agility: number;
  wisdom: number;

  fireResist: number;
  iceResist: number;
  earthResist: number;
  darkResist: number;
  lightResist: number;

  description?: string;
  imageUrl?: string;
  experienceReward: number;
  goldReward: number;
}
