<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('accommodation_name')->nullable();
            $table->string('accommodation_address')->nullable();
            $table->string('accommodation_city')->nullable();
            $table->string('accommodation_country')->nullable();
            $table->string('accommodation_phone')->nullable();
            $table->string('accommodation_email')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->decimal('accommodation_total_amount', 10, 2)->nullable();

            $table->string('flight_class')->nullable();
            $table->string('seat_number')->nullable();
            $table->string('departure_airport_trip_A');
            $table->string('arrival_airport_trip_A');
            $table->date('departure_airport_trip_A_date');
            $table->date('arrival_airport_trip_A_date');
            $table->string('departure_airport_trip_B');
            $table->string('arrival_airport_trip_B');
            $table->date('departure_airport_trip_B_date');
            $table->date('arrival_airport_trip_B_date');
            $table->string('carrier')->nullable();
            $table->decimal('flights_total_amount', 10, 2)->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('client_address')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_email')->nullable();

            $table->string('payment_type')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('full_name')->nullable();
            $table->string('receipt_address')->nullable();
            $table->string('receipt_phone')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
