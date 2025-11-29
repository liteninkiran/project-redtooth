import { bootstrapApplication } from '@angular/platform-browser';
import { appConfig } from './app/app.config';
import { App } from './app/app';
import { ModuleRegistry, AllCommunityModule } from 'ag-grid-community';
import {
    ColumnsToolPanelModule,
    ServerSideRowModelModule,
    SideBarModule,
} from 'ag-grid-enterprise';

ModuleRegistry.registerModules([
    AllCommunityModule,
    SideBarModule,
    ColumnsToolPanelModule,
    ServerSideRowModelModule,
]);

bootstrapApplication(App, appConfig).catch((err) => console.error(err));
