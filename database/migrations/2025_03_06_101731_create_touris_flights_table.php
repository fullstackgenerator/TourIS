<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('touris_flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_class');
            $table->string('seat_number');
            $table->string('departure_airport_trip_A');
            $table->string('arrival_airport_trip_A');
            $table->date('departure_airport_trip_A_date');
            $table->date('arrival_airport_trip_A_date');
            $table->string('departure_airport_trip_B');
            $table->string('arrival_airport_trip_B');
            $table->date('departure_airport_trip_B_date');
            $table->date('arrival_airport_trip_B_date');
            $table->string('carrier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('touris_flights');
    }
};
