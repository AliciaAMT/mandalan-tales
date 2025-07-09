export interface InventoryItem {
  id?: string; // document ID if separate collection
  characterId: string;

  name: string;
  type: 'weapon' | 'armor' | 'consumable' | 'misc';
  slot?: 'head' | 'body' | 'legs' | 'hands' | 'feet' | 'weapon' | 'offhand';

  quantity: number;
  equipped: boolean;

  bonuses?: {
    strength?: number;
    agility?: number;
    wisdom?: number;
    [key: string]: number | undefined;
  };

  description?: string;
  imageUrl?: string;

  createdAt?: any;
  updatedAt?: any;
}
