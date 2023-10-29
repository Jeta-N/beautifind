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
        Schema::create('portfolio_image', function (Blueprint $table) {
            $table->id('pi_id');
            $table->foreignId('service_id')->constrained('service', 'service_id');
            $table->string('image_path');
            $table->string('portfolio_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_image');
    }
};
