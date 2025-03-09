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
            $table->string('departure_from_start');
            $table->string('arrival_to_start');
            $table->string('departure_from_finish');
            $table->string('arrival_to_finish');
            $table->string('carrier');
            $table->date('departure_date_to_destination');
            $table->date('departure_date_from_destination');
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
