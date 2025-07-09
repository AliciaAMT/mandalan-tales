import { Injectable, inject } from '@angular/core';
import { CharacterService } from './character.service';
import { Portal, PortalAction, MapNameMapping } from '../models/portal.model';
import { Flags } from '../models/flags.model';
import { Inventory } from '../models/inventory.model';

@Injectable({ providedIn: 'root' })
export class PortalService {
  private characterService = inject(CharacterService);

  constructor() {
    this.buildPortalLookup();
  }

  // Map name mapping for user-friendly display names
  private mapNames: MapNameMapping = {
    'homeup': 'Your Bedroom',
    'home': 'Father\'s House',
    'yard': 'Family Yard',
    'barn': 'Barn',
    'cellar': 'Cellar',
    'ishforest': 'Ishandar Forest',
    'ishandar': 'City of Ishandar',
    'marah': 'Lady Marah\'s House',
    'cave': 'Cave',
    'pyramid': 'Pyramid',
    'pyramida': 'Pyramid Level 1',
    'pyramidb': 'Pyramid Level 2',
    'hoe': 'House of Elders',
    'inn': 'The Inn',
    'ishpeasant': 'Peasant\'s Home',
    'enchantress': 'Enchantress\'s Emporium',
    'alchemist': 'Alchemist\'s Laboratory',
    'guild': 'Guild Hall',
    'blacksmith': 'Blacksmith\'s Forge',
    'genstore': 'General Store',
    'magicshop': 'Magic Shoppe'
  };

  // Efficient portal lookup by map and coordinates
  private portalLookup: Map<string, Map<string, Portal>> = new Map();

  // Define all portals organized by map and coordinates
  private portals: Portal[] = [
    // Homeup map portals
    {
      map: 'homeup',
      x: 1,
      y: 1,
      name: 'Stairs Down',
      description: 'A wooden staircase leading down to the main floor.',
      image: 'stairsdown',
      targetMap: 'home',
      targetX: 1,
      targetY: 1,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to go down the stairs?',
      experience: 5
    },
    // Home map portals
    {
      map: 'home',
      x: 1,
      y: 1,
      name: 'Stairs Up',
      description: 'A wooden staircase leading up to your bedroom.',
      image: 'stairsdown',
      targetMap: 'homeup',
      targetX: 1,
      targetY: 1,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to go up the stairs?',
      experience: 5
    },
    {
      map: 'home',
      x: 3,
      y: 3,
      name: 'Front Door',
      description: 'The front door of your father\'s house.',
      image: 'door',
      targetMap: 'ishforest',
      targetX: 2,
      targetY: 1,
      targetMapDimensions: 44,
      confirmationMessage: 'Do you want to go through the front door?',
      experience: 5
    },
    {
      map: 'home',
      x: 2,
      y: 1,
      name: 'Back Door',
      description: 'The back door leading to the yard.',
      image: 'door',
      targetMap: 'yard',
      targetX: 2,
      targetY: 3,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to go through the back door?',
      experience: 5
    },
    // Yard map portals
    {
      map: 'yard',
      x: 2,
      y: 3,
      name: 'Back Door',
      description: 'The back door leading to the house.',
      image: 'door',
      targetMap: 'home',
      targetX: 2,
      targetY: 1,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to go through the back door?',
      experience: 5
    },
    {
      map: 'yard',
      x: 1,
      y: 3,
      name: 'Cellar Door',
      description: 'A heavy wooden door leading to the cellar.',
      image: 'cellar',
      targetMap: 'cellar',
      targetX: 2,
      targetY: 1,
      targetMapDimensions: 0,
      confirmationMessage: 'Do you want to enter the cellar?',
      requiresFlag: 'shepfeed',
      requiresFlagValue: 1,
      experience: 5
    },
    {
      map: 'yard',
      x: 1,
      y: 1,
      name: 'Barn Door',
      description: 'A large wooden door leading to the barn.',
      image: 'barn',
      targetMap: 'barn',
      targetX: 2,
      targetY: 1,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to enter the barn?',
      experience: 5
    },
    // Barn map portals
    {
      map: 'barn',
      x: 2,
      y: 1,
      name: 'Barn Door',
      description: 'The barn door leading back to the yard.',
      image: 'barn',
      targetMap: 'yard',
      targetX: 1,
      targetY: 1,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to exit the barn?',
      experience: 5
    },
    {
      map: 'barn',
      x: 3,
      y: 1,
      name: 'Cellar Door',
      description: 'A heavy wooden door leading to the cellar.',
      image: 'cellar',
      targetMap: 'cellar',
      targetX: 2,
      targetY: 1,
      targetMapDimensions: 0,
      confirmationMessage: 'Do you want to enter the cellar?',
      requiresFlag: 'shepfeed',
      requiresFlagValue: 1,
      experience: 5
    },
    // Cellar map portals
    {
      map: 'cellar',
      x: 2,
      y: 1,
      name: 'Ladder Out of Cellar',
      description: 'A wooden ladder leading back up to the yard.',
      image: 'ladder',
      targetMap: 'yard',
      targetX: 1,
      targetY: 3,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to climb the ladder out of the cellar?',
      experience: 5
    },
    // Ishandar Forest map portals
    {
      map: 'ishforest',
      x: 2,
      y: 1,
      name: 'Father\'s House',
      description: 'The door to your father\'s house.',
      image: 'door',
      targetMap: 'home',
      targetX: 3,
      targetY: 3,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to enter your father\'s house?',
      experience: 5
    },
    {
      map: 'ishforest',
      x: 4,
      y: 4,
      name: 'Gate to Ishandar',
      description: 'A large stone gate leading to the city of Ishandar.',
      image: 'door',
      targetMap: 'ishandar',
      targetX: 1,
      targetY: 2,
      targetMapDimensions: 77,
      confirmationMessage: 'Do you want to enter the gate to Ishandar?',
      experience: 10
    },
    {
      map: 'ishforest',
      x: 4,
      y: 2,
      name: 'Lady Marah\'s House',
      description: 'The door to Lady Marah\'s house.',
      image: 'door',
      targetMap: 'marah',
      targetX: 1,
      targetY: 2,
      targetMapDimensions: 33,
      confirmationMessage: 'Do you want to enter Lady Marah\'s house?',
      experience: 5
    },
    {
      map: 'ishforest',
      x: 4,
      y: 1,
      name: 'Cave Entrance',
      description: 'A dark cave entrance.',
      image: 'caveentrance',
      targetMap: 'cave',
      targetX: 1,
      targetY: 3,
      targetMapDimensions: 0,
      confirmationMessage: 'Do you want to enter the cave?',
      experience: 5
    },
    // Ishandar map portals
    {
      map: 'ishandar',
      x: 1,
      y: 2,
      name: 'Gate to Ishandar Forest',
      description: 'A large stone gate leading back to the forest.',
      image: 'door',
      targetMap: 'ishforest',
      targetX: 4,
      targetY: 4,
      targetMapDimensions: 44,
      confirmationMessage: 'Do you want to exit through the gate?',
      experience: 5
    },
    // Marah's House map portals
    {
      map: 'marah',
      x: 1,
      y: 2,
      name: 'Front Door',
      description: 'The front door leading back to the forest.',
      image: 'door',
      targetMap: 'ishforest',
      targetX: 4,
      targetY: 2,
      targetMapDimensions: 44,
      confirmationMessage: 'Do you want to exit through the front door?',
      experience: 5
    },
    // Cave map portals
    {
      map: 'cave',
      x: 1,
      y: 3,
      name: 'Cave Exit',
      description: 'The exit leading back to the forest.',
      image: 'caveentrance',
      targetMap: 'ishforest',
      targetX: 4,
      targetY: 1,
      targetMapDimensions: 44,
      confirmationMessage: 'Do you want to exit the cave?',
      experience: 5
    }
  ];

  /**
   * Build efficient portal lookup structure
   */
  private buildPortalLookup(): void {
    this.portalLookup.clear();

    for (const portal of this.portals) {
      if (!this.portalLookup.has(portal.map)) {
        this.portalLookup.set(portal.map, new Map());
      }

      const coordinateKey = `${portal.x},${portal.y}`;
      this.portalLookup.get(portal.map)!.set(coordinateKey, portal);
    }
  }

  /**
   * Get portal at specific coordinates on a map
   */
  getPortal(map: string, x: number, y: number): Portal | null {
    // Use efficient lookup: first check map, then coordinates
    const mapPortals = this.portalLookup.get(map);
    if (!mapPortals) {
      return null; // No portals for this map
    }

    const coordinateKey = `${x},${y}`;
    return mapPortals.get(coordinateKey) || null;
  }

  /**
   * Check if a portal exists at the given coordinates
   */
  hasPortal(map: string, x: number, y: number): boolean {
    return this.getPortal(map, x, y) !== null;
  }

  /**
   * Get portal action for the given coordinates
   */
  getPortalAction(map: string, x: number, y: number): PortalAction | null {
    const portal = this.getPortal(map, x, y);
    if (!portal) {
      return null;
    }

    return {
      map,
      x,
      y,
      portal
    };
  }

  /**
   * Check if portal requirements are met
   */
  async checkPortalRequirements(portal: Portal, characterName: string): Promise<{ canUse: boolean; message?: string }> {
    // Check flag requirements
    if (portal.requiresFlag) {
      const flags = await this.characterService.getCharacterFlags(characterName);
      if (!flags) {
        return { canUse: false, message: 'Unable to check portal requirements.' };
      }

      const flagValue = flags[portal.requiresFlag as keyof Flags];
      if (portal.requiresFlagValue !== undefined && flagValue < portal.requiresFlagValue) {
        return {
          canUse: false,
          message: `You cannot use this portal. ${portal.description}`
        };
      }
    }

    // Check item requirements
    if (portal.requiresItem) {
      // This would need to be implemented with inventory service
      // For now, we'll assume the item is available
      // TODO: Implement item requirement checking
    }

    return { canUse: true };
  }

  /**
   * Use a portal to change the character's location
   */
  async usePortal(portal: Portal, characterName: string): Promise<{ success: boolean; message: string }> {
    try {
      // Check requirements
      const requirements = await this.checkPortalRequirements(portal, characterName);
      if (!requirements.canUse) {
        return { success: false, message: requirements.message || 'Cannot use this portal.' };
      }

      // Get current character
      const character = this.characterService.getCurrentCharacter();
      if (!character) {
        return { success: false, message: 'No character found.' };
      }

      // Update character location
      await this.characterService.updateCharacter(character.id!, {
        map: portal.targetMap,
        xaxis: portal.targetX,
        yaxis: portal.targetY,
        mapdimensions: portal.targetMapDimensions
      });

      // Add experience if specified
      if (portal.experience) {
        await this.characterService.updateCharacter(character.id!, {
          experience: character.experience + portal.experience
        });
      }

            return {
        success: true,
        message: `You have entered ${this.getMapDisplayName(portal.targetMap)}.`
      };
    } catch (error) {
      console.error('Error using portal:', error);
      return { success: false, message: 'An error occurred while using the portal.' };
    }
  }

  /**
   * Get all portals for a specific map
   */
  getPortalsForMap(map: string): Portal[] {
    const mapPortals = this.portalLookup.get(map);
    return mapPortals ? Array.from(mapPortals.values()) : [];
  }

  /**
   * Get user-friendly name for a map
   */
  getMapDisplayName(map: string): string {
    return this.mapNames[map] || map;
  }
}
