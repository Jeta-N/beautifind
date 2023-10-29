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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('booking_id');
            $table->foreignId('user_id')->constrained('user', 'user_id');
            $table->foreignId('service_id')->constrained('service', 'service_id');
            $table->foreignId('bs_id')->constrained('booking_slot', 'bs_id');
            $table->foreignId('st_id')->contrained('service_type', 'st_id');
            $table->double('price');
            $table->string('booking_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
