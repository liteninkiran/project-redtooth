import { Component, inject } from '@angular/core';
import { VenueService } from '../../services/venue.service';
import { CommonModule } from '@angular/common';
import { AgGridAngular } from 'ag-grid-angular';
import type {
    AutoSizeStrategy,
    ColDef,
    GridApi,
    GridReadyEvent,
    ISizeColumnsToFitParams,
} from 'ag-grid-community';
import { MatButtonModule } from '@angular/material/button';

type ColumnConfig = {
    field: string;
    header?: string;
};

type ColumnLimits = { field: string; maxWidth: number };

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

const colDefMapFn = (col: ColumnConfig) => ({
    field: col.field,
    headerName: col.header || col.field,
    hide: !visibleColumns.includes(col.field),
    sortable: true,
    filter: true,
    resizable: true,
});

const mapFn1 = (c: ColumnLimits) => ({ colId: c.field, maxWidth: c.maxWidth });
const mapFn2 = (c: ColumnLimits) => ({ key: c.field, maxWidth: c.maxWidth });
const columnLimits: ColumnLimits[] = [{ field: 'map_html', maxWidth: 900 }];
const defaultMinWidth = 50;

@Component({
    selector: 'app-venue',
    imports: [CommonModule, AgGridAngular, MatButtonModule],
    templateUrl: './venue.html',
    styleUrl: './venue.scss',
})
export class Venue {
    private venueService = inject(VenueService);
    public venues$ = this.venueService.getVenues();
    public colDefs: ColDef[] = allColumns.map(colDefMapFn);
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
    public autoSizeStrategy: AutoSizeStrategy = {
        type: 'fitGridWidth',
        defaultMinWidth,
        columnLimits: columnLimits.map(mapFn1),
    };
    private gridApi!: GridApi<Venue[]>;

    public autoFitColumns(): void {
        this.gridApi.sizeColumnsToFit({
            defaultMinWidth,
            columnLimits: columnLimits.map(mapFn2),
        });
    }

    public onGridReady(params: GridReadyEvent<Venue[]>) {
        this.gridApi = params.api;
    }

    public showAllColumns(): void {
        this.colDefs = this.colDefs.map((col) => ({ ...col, hide: false }));
    }

    public onColumnVisible(event: any): void {
        this.autoFitColumns();
    }
}
