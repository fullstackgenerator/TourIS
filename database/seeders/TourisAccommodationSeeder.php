<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourisAccommodation;

class TourisAccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourisAccommodation::factory()->count(10)->create();
    }
}
