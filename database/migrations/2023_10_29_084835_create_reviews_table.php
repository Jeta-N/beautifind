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
        Schema::create('review', function (Blueprint $table) {
            $table->id('review_id');
            $table->foreignId('user_id')->constrained('user', 'user_id');
            $table->foreignId('booking_id')->constrained('booking', 'booking_id');
            $table->foreignId('service_id')->constrained('service', 'service_id');
            $table->double('rating');
            $table->string('review_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
