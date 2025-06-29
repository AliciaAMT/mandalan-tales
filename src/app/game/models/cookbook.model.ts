export interface Cookbook {
  id?: string;
  charname: string; // Legacy field name from old demo

  // Recipe flags - 1 if learned, 0 if not
  friedmeat: number;
  friedmeatsandwich: number;
  applesauce: number;
  cesarsalad: number;
  lifepotion: number;
  friedeggs: number;
  diseasepot: number; // disease potion
  holdpot: number; // hold potion

  // Additional recipes that might be added later
  manapotion?: number;
  strengthpotion?: number;
  speedpotion?: number;
  accuracypotion?: number;
  agilitypotion?: number;
  wisdompotion?: number;

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}

// Default cookbook values for new characters
export const DEFAULT_COOKBOOK: Omit<Cookbook, 'charname'> = {
  friedmeat: 0,
  friedmeatsandwich: 0,
  applesauce: 0,
  cesarsalad: 0,
  lifepotion: 0,
  friedeggs: 0,
  diseasepot: 0,
  holdpot: 0,
  manapotion: 0,
  strengthpotion: 0,
  speedpotion: 0,
  accuracypotion: 0,
  agilitypotion: 0,
  wisdompotion: 0,
  createdAt: Date.now(),
  updatedAt: Date.now()
};
