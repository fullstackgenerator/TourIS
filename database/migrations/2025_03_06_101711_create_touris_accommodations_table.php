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
        Schema::create('touris_accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('accommodation_country');
            $table->string('accommodation_city');
            $table->string('accommodation_name');
            $table->string('accommodation_address');
            $table->string('accommodation_phone');
            $table->string('accommodation_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('touris_accommodations');
    }
};
