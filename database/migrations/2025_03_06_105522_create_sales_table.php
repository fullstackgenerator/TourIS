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

            $table->string('flight_number')->nullable();
            $table->string('flight_class')->nullable();
            $table->string('seat_number')->nullable();
            $table->string('departure_from')->nullable();
            $table->string('arrival_to')->nullable();
            $table->string('carrier')->nullable();
            $table->date('departure_date')->nullable();
            $table->date('arrival_date')->nullable();
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
            $table->boolean('cancellation')->default(0);

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
