export interface Enemy {
  id?: string;
  charname: string; // Legacy field name from old demo

  // Current enemy information
  enemy: string; // Enemy type/name
  enemyname: string; // Display name
  enemylevel: number;
  enemylife: number;
  enemymaxlife: number;
  enemymana: number;
  enemymaxmana: number;
  enemycondition: string; // Enemy status condition

  // Combat state
  fight: number; // 1 if in combat, 0 if not
  event: string; // Combat log/events

  // Enemy stats (from old demo)
  enemystrength?: number;
  enemyspeed?: number;
  enemyaccuracy?: number;
  enemyagility?: number;
  enemywisdom?: number;
  enemyluck?: number;

  // Enemy resistances
  enemyfireresist?: number;
  enemyiceresist?: number;
  enemyairresist?: number;
  enemyearthresist?: number;
  enemylightresist?: number;
  enemydarkresist?: number;
  enemypoisonresist?: number;
  enemymindresist?: number;

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}

// Default enemy values for new characters
export const DEFAULT_ENEMY: Omit<Enemy, 'charname'> = {
  enemy: '',
  enemyname: '',
  enemylevel: 0,
  enemylife: 0,
  enemymaxlife: 0,
  enemymana: 0,
  enemymaxmana: 0,
  enemycondition: 'Good',
  fight: 0,
  event: '',
  enemystrength: 0,
  enemyspeed: 0,
  enemyaccuracy: 0,
  enemyagility: 0,
  enemywisdom: 0,
  enemyluck: 0,
  enemyfireresist: 0,
  enemyiceresist: 0,
  enemyairresist: 0,
  enemyearthresist: 0,
  enemylightresist: 0,
  enemydarkresist: 0,
  enemypoisonresist: 0,
  enemymindresist: 0,
  createdAt: Date.now(),
  updatedAt: Date.now()
};
