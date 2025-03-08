<?php

namespace Database\Seeders;

use App\Models\TourisClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TourisClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TourisClient::factory()->count(10)->create();
    }
}
