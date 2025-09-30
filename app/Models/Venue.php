<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'venueid',
        'venuename',
        'lat',
        'lng',
        'active',
        'venueaddress1',
        'venueaddress2',
        'venuetown',
        'venuecounty',
        'venuepostcode',
        'gamenight',
        'venueimage',
        'landlordfn',
        'landlordsn',
        'venuetelno',
        'landlordtitle',
        'imageapproval',
        'venue_status_id',
        'map_html',
    ];

    public $incrementing = true;
}
