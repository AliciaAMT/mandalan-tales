export interface UserSettings {
  id?: string;
  userId: string;
  themeColor: string; // CSS color value (hex, rgb, etc.)
  createdAt: number;
  updatedAt: number;
}

export const DEFAULT_THEME_COLOR = '#6b4e26'; // Darker gold color
