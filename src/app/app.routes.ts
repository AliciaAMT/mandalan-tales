import { Routes } from '@angular/router';
import { AuthGuard } from './guards/auth.guard';


export const routes: Routes = [
  {
    path: '',
    pathMatch: 'full',
    loadComponent: () => import('./home/home.page').then(m => m.HomePage)

  },
  {
    path: 'about',
    loadComponent: () =>
      import('./about/about.component').then(m => m.AboutComponent),
  },
  {
    path: 'contact',
    loadComponent: () =>
      import('./contact/contact.component').then(m => m.ContactComponent),
  },
  {
    path: 'legal',
    loadComponent: () =>
      import('./legal/legal.component').then(m => m.LegalComponent),
  },
  {
    path: 'login',
    loadComponent: () =>
      import('./login/login.component').then(m => m.LoginComponent),
  },
  {
    path: 'create-account',
    loadComponent: () =>
      import('./create-account/create-account.component').then(m => m.CreateAccountComponent)
  },

  {
    path: 'forgot-password',
    loadComponent: () =>
      import('./forgot-password/forgot-password.component').then(
        m => m.ForgotPasswordComponent
      )
  },
  {
    path: 'dashboard',
    canActivate: [AuthGuard],
    loadComponent: () =>
      import('./dashboard/dashboard.component').then((m) => m.DashboardComponent),
  },
  {
    path: 'create-character',
    loadComponent: () =>
      import('./dashboard/create-character/create-character.page').then((m) => m.CreateCharacterPage),
  },
  {
    path: 'game',
    canActivate: [AuthGuard],
    loadComponent: () => import('./game/pages/main/main.page').then( m => m.MainPage)
  },
  {
    path: '**',
    redirectTo: '',
  }
];
