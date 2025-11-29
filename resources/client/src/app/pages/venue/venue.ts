import { Component, inject } from '@angular/core';
import { VenueService } from '../../services/venue.service';
import { CommonModule } from '@angular/common';
import { AgGridAngular } from 'ag-grid-angular'; // Angular Data Grid Component
import type { ColDef } from 'ag-grid-community'; // Column Definition Type Interface
@Component({
    selector: 'app-venue',
    imports: [CommonModule, AgGridAngular],
    templateUrl: './venue.html',
    styleUrl: './venue.scss',
})
export class Venue {
    private venueService = inject(VenueService);
    public venues$ = this.venueService.getVenues();

    colDefs: ColDef[] = [
        // { field: 'id' },
        // { field: 'venueid' },
        { field: 'venuename' },
        // { field: 'lat' },
        // { field: 'longi' },
        // { field: 'active' },
        // { field: 'venueaddress1' },
        // { field: 'venueaddress2' },
        { field: 'venuetown' },
        // { field: 'venuecounty' },
        // { field: 'venuepostcode' },
        { field: 'gamenight' },
        // { field: 'venueimage' },
        // { field: 'landlordfn' },
        // { field: 'landlordsn' },
        { field: 'venuetelno' },
        // { field: 'landlordtitle' },
        // { field: 'imageapproval' },
        { field: 'distance_miles' },
        // { field: 'venue_status_id' },
        // { field: 'map_html' },
        // { field: 'created_at' },
        // { field: 'updated_at' },
    ];
}
