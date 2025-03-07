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
        Schema::create('touris_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_type');
            $table->unsignedBigInteger('amount');
            $table->date('payment_date');
            $table->string('full_name')->nullable();
            $table->string('recipient_address')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->string('cancellation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('touris_payments');
    }
};
