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

        Schema::create('service', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('service_name');
            $table->string('service_description')->nullable();
            $table->string('service_opening_hours')->nullable();
            $table->string('service_address')->nullable();
            $table->foreignId('city_id')->constrained('city', 'city_id');
            $table->string('service_phone')->nullable();
            $table->string('service_email')->nullable();
            $table->string('service_instagram')->nullable();
            $table->string('logo_image_path');
            $table->string('service_image_path');
            $table->boolean('is_active');
            $table->boolean('has_faq');
            $table->boolean('has_portfolio');
            $table->boolean('has_promo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
