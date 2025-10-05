import { Routes } from '@angular/router';
import { Venue } from './pages/venue/venue';
import { Home } from './pages/home/home';

export const routes: Routes = [
    { path: '', redirectTo: '/home', pathMatch: 'full' },
    { path: 'home', component: Home },
    { path: 'venue', component: Venue },
    { path: '**', redirectTo: '/home' },
];
