import { Component, inject } from '@angular/core';
import { VenueService } from '../../services/venue.service';
import { CommonModule } from '@angular/common';

@Component({
    selector: 'app-venue',
    imports: [CommonModule],
    templateUrl: './venue.html',
    styleUrl: './venue.scss',
})
export class Venue {
    private venueService = inject(VenueService);
    public venues$ = this.venueService.getVenues();
}
