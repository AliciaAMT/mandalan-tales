export interface User {
  uid: string;
  email: string;
  displayName?: string;
  role?: 'player' | 'admin';
  createdAt: number | Date;
  lastSeen?: number | Date;
  totalPlayMinutes?: number;
  settings?: {
    darkMode?: boolean;
    soundOn?: boolean;
  };
}
