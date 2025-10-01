import { Routes } from '@angular/router';
import { Venue } from './pages/venue/venue';

export const routes: Routes = [
    {
        path: '',
        redirectTo: 'venue',
        pathMatch: 'full',
    },
    {
        path: 'venue',
        component: Venue,
    },
];
