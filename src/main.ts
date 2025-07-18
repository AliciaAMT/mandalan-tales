import { bootstrapApplication } from '@angular/platform-browser';
import { RouteReuseStrategy, provideRouter, withPreloading, PreloadAllModules } from '@angular/router';
import { IonicRouteStrategy, provideIonicAngular } from '@ionic/angular/standalone';

import { routes } from './app/app.routes';
import { AppComponent } from './app/app.component';
import { provideFirebaseApp, initializeApp } from '@angular/fire/app';
import { provideFirestore, getFirestore } from '@angular/fire/firestore';
import { provideAuth, getAuth } from '@angular/fire/auth';
import { environment } from './environments/environment';
import { addIcons } from 'ionicons';
import {
  logOutOutline,
  homeOutline,
  personOutline,
  informationCircleOutline,
  mailOutline,
  documentTextOutline,
  trashOutline,
  alertCircleOutline,
  arrowBackOutline,
  addCircleOutline
} from 'ionicons/icons';

addIcons({
  'log-out-outline': logOutOutline,
  'home-outline': homeOutline,
  'person-outline': personOutline,
  'information-circle-outline': informationCircleOutline,
  'mail-outline': mailOutline,
  'document-text-outline': documentTextOutline,
  'trash-outline': trashOutline,
  'alert-circle-outline': alertCircleOutline,
  'arrow-back': arrowBackOutline,
  'add-circle-outline': addCircleOutline
});


bootstrapApplication(AppComponent, {
  providers: [
    { provide: RouteReuseStrategy, useClass: IonicRouteStrategy },
    provideIonicAngular(),
    provideRouter(routes, withPreloading(PreloadAllModules)),
    provideFirebaseApp(() => initializeApp(environment.firebase)),
    provideAuth(() => getAuth()),
    provideFirestore(() => getFirestore()),
  ],
});
