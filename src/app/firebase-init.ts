// src/app/firebase-init.ts
import { initializeApp } from 'firebase/app';
import { getAuth } from 'firebase/auth';
import { environment } from 'src/environments/environment';

const firebaseApp = initializeApp(environment.firebase);

export const auth = getAuth(firebaseApp);