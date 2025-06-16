import type { CapacitorConfig } from '@capacitor/cli';

const config: CapacitorConfig = {
  appId: 'com.accessiblewebmedia.app',
  appName: 'mandalan-tales',
  webDir: 'www',
  plugins: {
    SplashScreen: {
      launchShowDuration: 3000,     // Duration in ms (optional)
      launchAutoHide: true,         // Auto-hide the splash after web loads
      backgroundColor: "#000000",   // Matches your black background
      androidSplashResourceName: "splash", // usually default
      androidScaleType: "CENTER_CROP",    // Optional: cover or fit
      showSpinner: false
    }
  }
};

export default config;
