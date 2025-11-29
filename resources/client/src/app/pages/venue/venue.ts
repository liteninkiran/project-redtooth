import { Component, inject, ViewEncapsulation } from '@angular/core';
import { Options, VenueService } from '../../services/venue.service';
import { CommonModule } from '@angular/common';
import { AgGridAngular } from 'ag-grid-angular';
import type {
    AutoSizeStrategy,
    ColDef,
    GridApi,
    GridOptions,
    GridReadyEvent,
    IServerSideGetRowsParams,
} from 'ag-grid-community';
import { MatButtonModule } from '@angular/material/button';
import { VenueResponse } from '../../interfaces/venue';
import { MatFormField, MatLabel } from '@angular/material/form-field';
import { MatOption, MatSelect } from '@angular/material/select';

type ColumnConfig = {
    field: string;
    header?: string;
};

type ColumnLimits = {
    field: string;
    maxWidth: number;
};

const paginationPageSize = 5;
const cacheBlockSize = 5;

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
    imports: [
        CommonModule,
        AgGridAngular,
        MatButtonModule,
        MatFormField,
        MatLabel,
        MatSelect,
        MatOption,
    ],
    templateUrl: './venue.html',
    styleUrl: './venue.scss',
    encapsulation: ViewEncapsulation.None,
})
export class Venue {
    private venueService = inject(VenueService);
    public visibleColumns = visibleColumns;
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
    private gridApi!: GridApi<VenueResponse>;
    public gridOptions: GridOptions = {
        rowModelType: 'serverSide',
        pagination: true,
        paginationPageSize,
        cacheBlockSize,
        animateRows: true,
    };

    public autoFitColumns(): void {
        this.gridApi.sizeColumnsToFit({
            defaultMinWidth,
            columnLimits: columnLimits.map(mapFn2),
        });
    }

    public onGridReady(params: GridReadyEvent<VenueResponse>): void {
        this.gridApi = params.api;

        const getRows = (getRowsParams: IServerSideGetRowsParams) => {
            const { startRow, endRow, sortModel, filterModel } = getRowsParams.request;
            const options: Options = {
                startRow: startRow ?? 0,
                endRow: endRow ?? paginationPageSize,
                sortModel,
                filterModel,
                pageSize: paginationPageSize,
            };
            const $venues = this.venueService.getVenues(options);
            const getResponse = (response: VenueResponse) => ({
                rowData: response.rows,
                rowCount: response.lastRow,
            });
            const next = (response: VenueResponse) => getRowsParams.success(getResponse(response));
            const error = () => getRowsParams.fail();
            $venues.subscribe({ next, error });
        };

        this.gridApi.setGridOption('serverSideDatasource', { getRows });
    }

    public showAllColumns(): void {
        this.colDefs = this.colDefs.map((col) => ({ ...col, hide: false }));
    }

    public onColumnVisible(event: any): void {
        this.autoFitColumns();
    }

    public onColumnSelectionChange(event: any): void {
        const selectedFields = event.value as string[];
        this.colDefs = this.colDefs.map((col) => ({
            ...col,
            hide: !selectedFields.includes(col.field ?? ''),
        }));
        this.gridApi.setGridOption('columnDefs', this.colDefs);
        this.autoFitColumns();
    }
}
