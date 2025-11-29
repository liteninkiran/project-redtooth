<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return $this->createRandom();
    }

    private function createRandom(): array
    {
        return [
            'venueid' => $this->faker->unique()->numberBetween(1, 1000),
            'venuename' => $this->faker->company,
            'lat' => $this->faker->latitude(-90, 90),
            'longi' => $this->faker->longitude(-180, 180),
            'active' => $this->faker->numberBetween(0, 1),
            'venueaddress1' => $this->faker->streetAddress,
            'venueaddress2' => $this->faker->secondaryAddress,
            'venuetown' => $this->faker->city,
            'venuecounty' => $this->faker->county,
            'venuepostcode' => $this->faker->postcode,
            'gamenight' => $this->faker->dayOfWeek,
            'venueimage' => $this->faker->imageUrl(640, 480, 'nightlife', true),
            'landlordfn' => $this->faker->firstName,
            'landlordsn' => $this->faker->lastName,
            'venuetelno' => $this->faker->phoneNumber,
            'landlordtitle' => $this->faker->title,
            'imageapproval' => $this->faker->numberBetween(0, 1),
            'venue_status_id' => $this->faker->numberBetween(1, 5), // adjust as needed
            'map_html' => '<iframe src="https://maps.google.com?q=' . $this->faker->latitude . ',' . $this->faker->longitude . '&output=embed"></iframe>',
        ];
    }

    public static array $staticVenues = [
        [
            "venueid" => "5360",
            "venuename" => "Chiseldon Sports & Social Club",
            "lat" => "51.5087744",
            "longi" => "-1.735394700000029",
            "active" => "1",
            "venueaddress1" => "6 Draycott Road",
            "venueaddress2" => "",
            "venuetown" => "Chiseldon",
            "venuecounty" => "Wiltshire",
            "venuepostcode" => "SN4 0LS",
            "gamenight" => "Thursday",
            "venueimage" => "5360.jpeg",
            "landlordfn" => "John",
            "landlordsn" => "Newton",
            "venuetelno" => "01793 740274",
            "landlordtitle" => "",
            "imageapproval" => "1",
            "distance_miles" => "11.25913804527637",
            "venue_status_id" => "1",
            "map_html" => "<div><div><div style=\"font-size:25px;\">Chiseldon Sports & Social Club - Chiseldon<br><div style=\"\"><div style=\"float:left;width:150px;\"><img width=\"150\" height=\"150\" alt=\"myVenue\" border=\"1\" src=\"/images/venues/5360.jpeg\"><br><span style=\"font-size:13px;\">Landlord:  John Newton</span><br></div><div style=\"float:left; width:145px; padding-left:15px; font-size:12px;\"><b>Chiseldon Sports & Social Club</b><br>6 Draycott Road<br>Chiseldon<br>SN4 0LS<br><br>01793 740274<br><br><b>Game Night: Thursday</b><br><a style=\"font-size:13px;\" href=\"/league/5360\">View League Details</a></div></div></div></div></div>"
        ],
        [
            "venueid" => "4691",
            "venuename" => "Packhorse",
            "lat" => "51.19730510000001",
            "longi" => "-1.8190988",
            "active" => "1",
            "venueaddress1" => "Wilson Road",
            "venueaddress2" => "Larkhill",
            "venuetown" => "Salisbury",
            "venuecounty" => "",
            "venuepostcode" => "SP4 8QB",
            "gamenight" => "Monday",
            "venueimage" => "4691.jpg",
            "landlordfn" => "Abbie",
            "landlordsn" => "The Manager",
            "venuetelno" => "01980 652476",
            "landlordtitle" => "",
            "imageapproval" => "1",
            "distance_miles" => "12.378774962974479",
            "venue_status_id" => "1",
            "map_html" => "<div><div><div style=\"font-size:25px;\">Packhorse - Salisbury<br><div style=\"\"><div style=\"float:left;width:150px;\"><img width=\"150\" height=\"150\" alt=\"myVenue\" border=\"1\" src=\"/images/venues/4691.jpg\"><br><span style=\"font-size:13px;\">Landlord:  Abbie The Manager</span><br></div><div style=\"float:left; width:145px; padding-left:15px; font-size:12px;\"><b>Packhorse</b><br>Wilson Road<br>Larkhill<br>Salisbury<br>SP4 8QB<br><br>01980 652476<br><br><b>Game Night: Monday</b><br><a style=\"font-size:13px;\" href=\"/league/4691\">View League Details</a></div></div></div></div></div>"
        ],
        [
            "venueid" => "6460",
            "venuename" => "White Hart (Wed)",
            "lat" => "51.20651420000001",
            "longi" => "-1.4799223",
            "active" => "0",
            "venueaddress1" => "Bridge Street",
            "venueaddress2" => "",
            "venuetown" => "Andover",
            "venuecounty" => "",
            "venuepostcode" => "SP10 1BH",
            "gamenight" => "Wednesday",
            "venueimage" => "6460.png",
            "landlordfn" => "The",
            "landlordsn" => "Manager",
            "venuetelno" => "01264 352266",
            "landlordtitle" => "",
            "imageapproval" => "1",
            "distance_miles" => "12.952941618427973",
            "venue_status_id" => "1",
            "map_html" => "<div><div><div style=\"font-size:25px;\">White Hart (Wed) - Andover<br><div style=\"\"><div style=\"float:left;width:150px;\"><img width=\"150\" height=\"150\" alt=\"myVenue\" border=\"1\" src=\"/images/venues/6460.png\"><br><span style=\"font-size:13px;\">Landlord:  The Manager</span><br></div><div style=\"float:left; width:145px; padding-left:15px; font-size:12px;\"><b>White Hart (Wed)</b><br>Bridge Street<br>Andover<br>SP10 1BH<br><br>01264 352266<br><br><b>Game Night: Wednesday</b><br><a style=\"font-size:13px;\" href=\"/league/6460\">View League Details</a></div></div></div></div></div>"
        ],
        [
            "venueid" => "4152",
            "venuename" => "White Hart (Mon)",
            "lat" => "51.20651429999999",
            "longi" => "-1.4799221",
            "active" => "1",
            "venueaddress1" => "Bridge Street",
            "venueaddress2" => "",
            "venuetown" => "Andover",
            "venuecounty" => "",
            "venuepostcode" => "SP10 1BH",
            "gamenight" => "Monday",
            "venueimage" => "untitled_59.png",
            "landlordfn" => "Mark",
            "landlordsn" => "Leech",
            "venuetelno" => "01264 352266",
            "landlordtitle" => "Mr",
            "imageapproval" => "1",
            "distance_miles" => "12.952941816271109",
            "venue_status_id" => "1",
            "map_html" => "<div><div><div style=\"font-size:25px;\">White Hart (Mon) - Andover<br><div style=\"\"><div style=\"float:left;width:150px;\"><img width=\"150\" height=\"150\" alt=\"myVenue\" border=\"1\" src=\"/images/venues/untitled_59.png\"><br><span style=\"font-size:13px;\">Landlord: Mr Mark Leech</span><br></div><div style=\"float:left; width:145px; padding-left:15px; font-size:12px;\"><b>White Hart (Mon)</b><br>Bridge Street<br>Andover<br>SP10 1BH<br><br>01264 352266<br><br><b>Game Night: Monday</b><br><a style=\"font-size:13px;\" href=\"/league/4152\">View League Details</a></div></div></div></div></div>"
        ],
        [
            "venueid" => "6585",
            "venuename" => "Dunkirk Social Club (Wed)",
            "lat" => "51.1716618",
            "longi" => "-1.7832246",
            "active" => "0",
            "venueaddress1" => "23 Church Street",
            "venueaddress2" => "",
            "venuetown" => "Salisbury",
            "venuecounty" => "",
            "venuepostcode" => "SP4 7EU",
            "gamenight" => "Wednesday",
            "venueimage" => "",
            "landlordfn" => "John",
            "landlordsn" => "Hughes",
            "venuetelno" => "01980 591051",
            "landlordtitle" => "",
            "imageapproval" => "0",
            "distance_miles" => "13.28745012036727",
            "venue_status_id" => "1",
            "map_html" => "<div><div><div style=\"font-size:25px;\">Dunkirk Social Club (Wed) - Salisbury<br><div style=\"\"><div style=\"float:left;width:150px;\"><img width=\"150\" height=\"150\" alt=\"myVenue\" border=\"1\" src=\"/images/venues/notavailable.jpeg\"><br><span style=\"font-size:13px;\">Landlord:  John Hughes</span><br></div><div style=\"float:left; width:145px; padding-left:15px; font-size:12px;\"><b>Dunkirk Social Club (Wed)</b><br>23 Church Street<br>Salisbury<br>SP4 7EU<br><br>01980 591051<br><br><b>Game Night: Wednesday</b><br><a style=\"font-size:13px;\" href=\"/league/6585\">View League Details</a></div></div></div></div></div>"
        ],
        [
            "venueid" => "6630",
            "venuename" => "Dunkirk Social Club (Thu)",
            "lat" => "51.1716618",
            "longi" => "-1.7832246",
            "active" => "0",
            "venueaddress1" => "23 Church Street",
            "venueaddress2" => "",
            "venuetown" => "Salisbury",
            "venuecounty" => "",
            "venuepostcode" => "SP4 7EU",
            "gamenight" => "Thursday",
            "venueimage" => "",
            "landlordfn" => "John",
            "landlordsn" => "Hughes",
            "venuetelno" => "01980 591051",
            "landlordtitle" => "",
            "imageapproval" => "0",
            "distance_miles" => "13.28745012036727",
            "venue_status_id" => "1",
            "map_html" => "<div><div><div style=\"font-size:25px;\">Dunkirk Social Club (Thu) - Salisbury<br><div style=\"\"><div style=\"float:left;width:150px;\"><img width=\"150\" height=\"150\" alt=\"myVenue\" border=\"1\" src=\"/images/venues/notavailable.jpeg\"><br><span style=\"font-size:13px;\">Landlord:  John Hughes</span><br></div><div style=\"float:left; width:145px; padding-left:15px; font-size:12px;\"><b>Dunkirk Social Club (Thu)</b><br>23 Church Street<br>Salisbury<br>SP4 7EU<br><br>01980 591051<br><br><b>Game Night: Thursday</b><br><a style=\"font-size:13px;\" href=\"/league/6630\">View League Details</a></div></div></div></div></div>"
        ],
        [
            "venueid" => "6540",
            "venuename" => "Steam Railway Co",
            "lat" => "51.55043509999999",
            "longi" => "-1.7748517",
            "active" => "1",
            "venueaddress1" => "14 Newport Street",
            "venueaddress2" => "Central Swindon South",
            "venuetown" => "Swindon",
            "venuecounty" => "",
            "venuepostcode" => "SN1 3DX",
            "gamenight" => "Tuesday",
            "venueimage" => "6540.jpg",
            "landlordfn" => "Ellysse",
            "landlordsn" => "Griffiths",
            "venuetelno" => "01793 978973",
            "landlordtitle" => "",
            "imageapproval" => "1",
            "distance_miles" => "14.496303777318934",
            "venue_status_id" => "1",
            "map_html" => "<div><div><div style=\"font-size:25px;\">Steam Railway Co - Swindon<br><div style=\"\"><div style=\"float:left;width:150px;\"><img width=\"150\" height=\"150\" alt=\"myVenue\" border=\"1\" src=\"/images/venues/6540.jpg\"><br><span style=\"font-size:13px;\">Landlord:  Ellysse Griffiths</span><br></div><div style=\"float:left; width:145px; padding-left:15px; font-size:12px;\"><b>Steam Railway Co</b><br>14 Newport Street<br>Central Swindon South<br>Swindon<br>SN1 3DX<br><br>01793 978973<br><br><b>Game Night: Tuesday</b><br><a style=\"font-size:13px;\" href=\"/league/6540\">View League Details</a></div></div></div></div></div>"
        ],
    ];
    
}
