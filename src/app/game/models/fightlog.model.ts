export interface FightLog {
  id?: string;
  characterId: string;

  enemyName: string;
  outcome: 'win' | 'loss';
  rounds: number;

  log: string[]; // e.g. ["You slash the rat for 8 damage.", "Rat bites you for 3."]
  timestamp: any;
}
