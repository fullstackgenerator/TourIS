<?php

namespace Database\Factories;

use App\Models\TourisAccommodation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourisAccommodationFactory extends Factory
{
    protected $model = TourisAccommodation::class;

    public function definition()
    {
        $hotelsByCity = [
            'New York' => ['The Plaza Hotel', 'The Ritz-Carlton New York', 'Hotel Pennsylvania', 'Four Seasons Hotel New York'],
            'Los Angeles' => ['The Beverly Hills Hotel', 'The Langham Huntington', 'Hotel Bel-Air', 'Waldorf Astoria Beverly Hills'],
            'Chicago' => ['The Drake Hotel', 'The Peninsula Chicago', 'Palmer House Hilton', 'W Chicago - Lakeshore'],
            'Paris' => ['The Ritz Paris', 'Le Meurice', 'Hotel Plaza Athénée', 'Four Seasons Hotel George V'],
            'Tokyo' => ['The Peninsula Tokyo', 'Park Hyatt Tokyo', 'Mandarin Oriental Tokyo', 'Shangri-La Hotel Tokyo'],
            'London' => ['The Savoy', 'The Ritz London', 'Claridge’s', 'The Langham London'],
            'Sydney' => ['The Darling', 'Four Seasons Hotel Sydney', 'Park Hyatt Sydney', 'Shangri-La Hotel Sydney'],
            'Berlin' => ['Hotel Adlon Kempinski', 'The Ritz-Carlton Berlin', 'Grand Hyatt Berlin', 'The Mandala Hotel'],
            'Rome' => ['Hotel de Russie', 'Rome Cavalieri, A Waldorf Astoria Resort', 'The St. Regis Rome', 'Hotel Quirinale'],
            'Vancouver' => ['Fairmont Waterfront', 'The Four Seasons Hotel Vancouver', 'The Fairmont Hotel Vancouver', 'Shangri-La Vancouver'],
        ];

        $countriesAndCities = [
            'USA' => ['New York', 'Los Angeles', 'Chicago'],
            'France' => ['Paris'],
            'Japan' => ['Tokyo'],
            'UK' => ['London'],
            'Australia' => ['Sydney'],
            'Germany' => ['Berlin'],
            'Italy' => ['Rome'],
            'Canada' => ['Vancouver'],
        ];

        $country = $this->faker->randomElement(array_keys($countriesAndCities));
        $city = $this->faker->randomElement($countriesAndCities[$country]);
        $accommodation_name = $this->faker->randomElement($hotelsByCity[$city] ?? [$this->faker->company]);

        return [
            'accommodation_country' => $country,
            'accommodation_city' => $city,
            'accommodation_name' => $accommodation_name,
            'accommodation_address' => $this->faker->address,
            'accommodation_phone' => $this->faker->phoneNumber,
            'accommodation_email' => $this->faker->email,
        ];
    }
}
