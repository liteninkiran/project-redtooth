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
        return [
            'venueid' => $this->faker->unique()->numberBetween(1, 1000),
            'venuename' => $this->faker->company,
            'lat' => $this->faker->latitude(-90, 90),
            'lng' => $this->faker->longitude(-180, 180),
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
}
