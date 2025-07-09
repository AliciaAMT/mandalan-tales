export interface Counters {
  id?: string;
  charname: string; // Legacy field name from old demo

  // Character status counters
  held: number; // Character held status
  bleeding: number; // Character bleeding status
  inferno: number; // Character burning status
  frozen: number; // Character frozen status
  stunned: number; // Character stunned status
  poisoned: number; // Character poisoned status

  // Enemy status counters
  eheld: number; // Enemy held status
  einferno: number; // Enemy burning status
  efrozen: number; // Enemy frozen status
  estunned: number; // Enemy stunned status
  epoisoned: number; // Enemy poisoned status
  ebleed: number; // Enemy bleeding status

  // Combat counters
  turn: number; // Current turn in combat
  round: number; // Current round in combat

  // Quest and game progress counters
  quest1?: number;
  quest2?: number;
  quest3?: number;
  quest4?: number;
  quest5?: number;

  // Achievement counters
  monstersKilled?: number;
  itemsCrafted?: number;
  spellsCast?: number;
  distanceTraveled?: number;

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}

// Default counters values for new characters
export const DEFAULT_COUNTERS: Omit<Counters, 'charname'> = {
  held: 0,
  bleeding: 0,
  inferno: 0,
  frozen: 0,
  stunned: 0,
  poisoned: 0,
  eheld: 0,
  einferno: 0,
  efrozen: 0,
  estunned: 0,
  epoisoned: 0,
  ebleed: 0,
  turn: 0,
  round: 0,
  quest1: 0,
  quest2: 0,
  quest3: 0,
  quest4: 0,
  quest5: 0,
  monstersKilled: 0,
  itemsCrafted: 0,
  spellsCast: 0,
  distanceTraveled: 0,
  createdAt: Date.now(),
  updatedAt: Date.now()
};
