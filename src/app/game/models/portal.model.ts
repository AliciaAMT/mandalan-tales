export interface Portal {
  id?: string;
  map: string;
  x: number;
  y: number;
  name: string;
  description: string;
  image: string;
  targetMap: string;
  targetX: number;
  targetY: number;
  targetMapDimensions: number;
  confirmationMessage: string;
  requiresFlag?: string;
  requiresFlagValue?: number;
  requiresItem?: string;
  requiresItemCount?: number;
  experience?: number;
}

export interface PortalAction {
  map: string;
  x: number;
  y: number;
  portal: Portal;
}

export interface MapNameMapping {
  [key: string]: string;
}
