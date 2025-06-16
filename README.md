Current Node v18 LTS
NPM 10 LTS
Ionic 7

Still works but there is no content yet  anyway. just start over, but keep this for reference. it has the wiki and timeline image and more. 
# Mandalan Tales

A text based, turn based mmorpg (massively multiplayer online role playing game) written with Ionic Angular(Typescript) and Firebase. This game is especially designed for accessibility and is playable with a screen reader on desktop and mobile. Originally written for a LAMP stack, it is being ported to Firebase for better performance and scalability.

See the [wiki](/WIKI.md) for more information on the game itself and the story.

## Getting Started
### Prerequisites

- [Node.js](https://nodejs.org/en/) (v16.17.0 or later LTS not latest!)
- use `npm ci` to install all dependencies NOT `npm install`
- use NVM to manage Node versions. NVM for windows can be found on Github [here](https://github.com/coreybutler/nvm-windows)
- use `nvm install 16.17.0` to install Node v16.17.0. Use `nvm use 16.17.0` to use Node v16.17.0. Use `nvm list` to see all installed versions of Node.
- use `ionic serve` to run the app in the browser
- use `ionic build` to build the app for production
- might need to reinstall ionic cli with `npm install -g @ionic/cli` if changed node versions
- might need to reinstall firebase cli with `npm install -g firebase-tools` if changed node versions
- might need to reinstall angular cli with `npm install -g @angular/cli` if changed node versions *** DO NOT DO THIS> IONIC WILL INSTALL THE RIGHT VERSION!!!

### Method

#### Command Line:

`ionic start`

Use tabs for future implementation. See https://ionicacademy.com/multiple-side-menus-ionic/ for adding menu to tabs. GitHub is https://github.com/AliciaAMT/academyMenus

See NOTES.md for more info.

`npm ci`

`npm install -g @angular/cli`

- Set up project in firebase. 
- Add web app in project settings. Angular Fire will copy your firebase config into your project. 
- Set up firestore.
- Set up storage.
- Set security rules for storage:
```typescript
rules_version = '2';
service firebase.storage {
  match /b/{bucket}/o {
    match /{allPaths=**} {
      allow read, write: if request.auth != null;
    }
  }
}
```
*Note: This is not secure. It allows anyone to read and write to your storage. You should set up authentication and only allow authenticated users to read and write to storage.*
- Set up authentication. 
- Set up analytics. 
- Set up hosting.
- Set up functions.
- Set up firestore indexes.
- Set up firestore rules:
```typescript
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {
    match /{document=**} {
      allow read, write: if request.auth != null;
    }
  }
}
```
*Note: This is not secure. It allows anyone to read and write to your firestore. You should set up authentication and only allow authenticated users to read and write to firestore.*


`ng add @angular/fire` (may need to use `firebase logout` and `firebase login` to get this to work)

`npm i ngx-quill@16.2.1-0`
`npm i --save-dev @types/quill@1.3.10`

`npm install ng-lazyload-image`

#### Install the image cropper package
`npm i ngx-image-cropper`
 
#### For mobile gestures
`npm i hammerjs`
 
#### Add native platforms
`ionic cap add ios`
`ionic cap add android`

#### For image upload with camera
`npm i @capacitor/camera`

#### For PWA
`npm i @ionic/pwa-elements`

```bash
npm install @capacitor/preferences
npx cap sync
```
*This is former Ionic Capacitor Storage. See https://capacitorjs.com/docs/apis/preferences*

NOTE! npx cap sync may need to be run after building the production app. Requires the 'www' directory with in idex.html file. Failed on first try.

### Structure

#### Manage your authentication state (and API calls)
`ionic g service services/authentication`

`ionic g service services/auth`

`ionic g service services/avatar`

#### Additional Pages
`ionic g page pages/intro`

`ionic g page pages/login`

`ionic g page pages/landing`

`ionic g page pages/home`

`ionic g page pages/profile`

`ionic g page pages/user` *probably not needed*


#### Additional Components
`ionic g component components/menu-header`

`ionic g component components/recover-creds`

`ionic g component components/show-hide-password`

#### Secure inside area
`ionic g guard guards/auth --implements CanLoad`

#### Show intro automatically once
`ionic g guard guards/intro --implements CanLoad`

#### Automatically log in users
`ionic g guard guards/autoLogin --implements CanLoad`

#### Models

`ionic g interface models/user`

### Refer to Quickstart guides for following features:

#### Tabs with Menus
Use tabs for future implementation. See https://ionicacademy.com/multiple-side-menus-ionic/ for adding menu to tabs. GitHub is https://github.com/AliciaAMT/academyMenus


* pages - the main pages of the app
* landing - the landing page
* home - the home page
* login - the login page
* registration - the register page
* admin dashboard - the admin dashboard page

#### Authentication and File Upload

https://ionicacademy.com/ionic-firebase-auth-upload/

https://devdactic.com/ionic-5-navigation-with-login

#### Simple CRUD with Modal and Toast

https://devdactic.com/ionic-firebase-angularfire-7

#### See also CMS-Admin template on GitHub: https://github.com/AliciaAMT/cms-admin

#### Image Cropper
https://ionicacademy.com/image-crop-ionic-angular/


## Dev Notes

### 10/31/2022

Taking a break. Need to finish transferring the data from the old site and complete legal pages and statements.

See github project at https://github.com/users/AliciaAMT/projects/3

## New Workflow
`ionic start mandalan-tales blank --type=angular --routing`
`npm install @capacitor/android`
`npm install @capacitor/ios`
`npx cap init`
`npx cap add android`
`npx cap add ios`
`npm install`
`npm install @capacitor/core @capacitor/cli`
`npx @capacitor/assets generate`

`npm install firebase @angular/fire`

## Dev Log
Mon, June 16 2025
- tweaking home page colors and layout
