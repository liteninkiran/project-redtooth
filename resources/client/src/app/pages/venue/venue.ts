import { Component, inject } from '@angular/core';
import { VenueService } from '../../services/venue.service';
import { CommonModule } from '@angular/common';
import { AgGridAngular } from 'ag-grid-angular';
import type { ColDef } from 'ag-grid-community';

interface ColumnConfig {
    field: string;
    header?: string;
}
const visibleColumns = ['venuename', 'venuetown', 'gamenight', 'venuetelno', 'distance_miles'];
const allColumns: ColumnConfig[] = [
    { field: 'id', header: 'ID' },
    { field: 'venueid', header: 'Venue ID' },
    { field: 'venuename', header: 'Venue Name' },
    { field: 'lat', header: 'Latitude' },
    { field: 'longi', header: 'Longitude' },
    { field: 'active', header: 'Active' },
    { field: 'venueaddress1', header: 'Address 1' },
    { field: 'venueaddress2', header: 'Address 2' },
    { field: 'venuetown', header: 'Town' },
    { field: 'venuecounty', header: 'County' },
    { field: 'venuepostcode', header: 'Postcode' },
    { field: 'gamenight', header: 'Game Night' },
    { field: 'venueimage', header: 'Image' },
    { field: 'landlordfn', header: 'Landlord First Name' },
    { field: 'landlordsn', header: 'Landlord Surname' },
    { field: 'venuetelno', header: 'Telephone' },
    { field: 'landlordtitle', header: 'Landlord Title' },
    { field: 'imageapproval', header: 'Image Approval' },
    { field: 'distance_miles', header: 'Distance (Miles)' },
    { field: 'venue_status_id', header: 'Venue Status' },
    { field: 'map_html', header: 'Map HTML' },
    { field: 'created_at', header: 'Created At' },
    { field: 'updated_at', header: 'Updated At' },
];

const mapFn = (col: ColumnConfig) => ({
    field: col.field,
    headerName: col.header || col.field,
    hide: !visibleColumns.includes(col.field),
    sortable: true,
    filter: true,
    resizable: true,
});

@Component({
    selector: 'app-venue',
    imports: [CommonModule, AgGridAngular],
    templateUrl: './venue.html',
    styleUrl: './venue.scss',
})
export class Venue {
    private venueService = inject(VenueService);
    public venues$ = this.venueService.getVenues();
    public colDefs: ColDef[] = allColumns.map(mapFn);
    public sideBar = {
        toolPanels: [
            {
                id: 'columns',
                labelDefault: 'Columns',
                labelKey: 'columns',
                iconKey: 'columns',
                toolPanel: 'agColumnsToolPanel',
                toolPanelParams: {
                    suppressRowGroups: true,
                    suppressValues: true,
                    suppressPivots: true,
                    suppressPivotMode: true,
                },
            },
        ],
        defaultToolPanel: '',
    };
}
