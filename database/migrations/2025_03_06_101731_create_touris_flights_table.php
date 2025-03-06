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
            $table->string('flight_number');
            $table->string('flight_class');
            $table->string('seat_number');
            $table->string('departure_location');
            $table->string('arrival_location');
            $table->string('carrier');
            $table->date('departure_date');
            $table->date('arrival_date');
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
