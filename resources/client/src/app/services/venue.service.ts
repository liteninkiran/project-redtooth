import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Venue } from '../interfaces/venue';

@Injectable({
    providedIn: 'root',
})
export class VenueService {
    private apiUrl = 'http://localhost:8000/api/venues';
    private http = inject(HttpClient);

    public getVenues(): Observable<Venue[]> {
        return this.http.get<Venue[]>(this.apiUrl);
    }
}
