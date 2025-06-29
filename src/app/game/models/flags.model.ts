export interface Flags {
  id?: string;
  charname: string; // Legacy field name from old demo

  // Home location flags
  firelit: string; // 'y' or 'n' - is the fireplace lit
  homechest: number; // Home chest opened
  homefireplace: number; // Home fireplace discovered
  homepantry: number; // Home pantry discovered
  homerack: number; // Home rack discovered
  homedrawer: number; // Home drawer discovered
  homeshelf: number; // Home shelf discovered
  homeshelf2: number; // Home shelf 2 discovered
  hometable: number; // Home table discovered
  homerug: number; // Home rug discovered

  // Bedroom flags
  bedroomrug: number; // Bedroom rug discovered
  bedroomwardrobe: number; // Bedroom wardrobe discovered
  bedroomdesk: number; // Bedroom desk discovered
  bedroomcoatrack: number; // Bedroom coatrack discovered
  bedroomshelf: number; // Bedroom shelf discovered
  bedroomchest: number; // Bedroom chest discovered
  bedroombed: number; // Bedroom bed discovered

  // Quest flags
  quest1: number; // Quest 1 completion
  quest2: number; // Quest 2 completion
  quest3: number; // Quest 3 completion
  quest4: number; // Quest 4 completion
  quest5: number; // Quest 5 completion

  // Item flags
  thehiddenkey: number; // Hidden key state (0-3)
  familycrest: number; // Family crest found

  // Game state flags
  tutorial_completed?: number;
  first_combat?: number;
  first_craft?: number;
  first_spell?: number;

  // Timestamps
  createdAt?: any;
  updatedAt?: any;
}

// Default flags values for new characters
export const DEFAULT_FLAGS: Omit<Flags, 'charname'> = {
  firelit: 'n',
  homechest: 0,
  homefireplace: 0,
  homepantry: 0,
  homerack: 0,
  homedrawer: 0,
  homeshelf: 0,
  homeshelf2: 0,
  hometable: 0,
  homerug: 0,
  bedroomrug: 0,
  bedroomwardrobe: 0,
  bedroomdesk: 0,
  bedroomcoatrack: 0,
  bedroomshelf: 0,
  bedroomchest: 0,
  bedroombed: 0,
  quest1: 0,
  quest2: 0,
  quest3: 0,
  quest4: 0,
  quest5: 0,
  thehiddenkey: 0,
  familycrest: 0,
  tutorial_completed: 0,
  first_combat: 0,
  first_craft: 0,
  first_spell: 0,
  createdAt: Date.now(),
  updatedAt: Date.now()
};
