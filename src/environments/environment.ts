// This file can be replaced during build by using the `fileReplacements` array.
// `ng build` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.

export const environment = {
  production: false,
  firebase: {
  apiKey: "AIzaSyBDgp4nioS2O0SyrBFr8rEECzkN4pLMKSA",
  authDomain: "mandalan-tales.firebaseapp.com",
  projectId: "mandalan-tales",
  storageBucket: "mandalan-tales.appspot.com",
  messagingSenderId: "714965728567",
  appId: "1:714965728567:web:247df5560ab7a819d9aeb2",
  measurementId: "G-BDT203TQ5Q"
  },
  verificationRedirectUrl: 'http://localhost:8100/login',
  recaptchaSiteKey: '6LfCQmYrAAAAAAW9jUsKIkBm8uAc41MGahUqSbpe',
  recaptchaSecretKey: '6LfCQmYrAAAAABmPEdJ_PsfBfZ31CDktB6KoR60A'
};

/*
 * For easier debugging in development mode, you can import the following file
 * to ignore zone related error stack frames such as `zone.run`, `zoneDelegate.invokeTask`.
 *
 * This import should be commented out in production mode because it will have a negative impact
 * on performance if an error is thrown.
 */
// import 'zone.js/plugins/zone-error';  // Included with Angular CLI.
