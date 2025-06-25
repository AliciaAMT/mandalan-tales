export interface Spell {
  id?: string;
  characterId: string;

  spellname: string;
  spelldescription?: string;
  spelllevel: number;

  spelltype: 'offensive' | 'defensive' | 'healing' | 'utility';
  element: 'fire' | 'ice' | 'air' | 'earth' | 'light' | 'dark';

  manacost: number;
  heallife?: number;
  damage?: number;
  offensive?: boolean;

  spellimage?: string;
}
