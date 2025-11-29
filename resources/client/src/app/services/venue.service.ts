import { HttpClient, HttpParams } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { VenueResponse } from '../interfaces/venue';

export type Options = {
    startRow: number;
    endRow: number;
    sortModel: any;
    filterModel: any;
    pageSize: number;
};

@Injectable({
    providedIn: 'root',
})
export class VenueService {
    private apiUrl = 'http://localhost:8000/api/venues';
    private http = inject(HttpClient);

    /**
     * Return Observable of server-side response
     */
    public getVenues(options: Options): Observable<VenueResponse> {
        const { startRow, endRow, sortModel, filterModel, pageSize } = options;
        const params = new HttpParams()
            .set('startRow', startRow)
            .set('endRow', endRow)
            .set('sortModel', JSON.stringify(sortModel))
            .set('filterModel', JSON.stringify(filterModel))
            .set('pageSize', pageSize);

        return this.http.get<VenueResponse>(this.apiUrl, { params });
    }
}
