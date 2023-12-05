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
            $table->string('service_description');
            $table->string('service_opening_hours');
            $table->string('service_address');
            $table->foreignId('city_id')->constrained('city', 'city_id');
            $table->string('service_phone');
            $table->string('service_email');
            $table->string('service_instagram');
            $table->string('logo_image_path');
            $table->string('service_image_path');
            $table->string('service_status');
            $table->timestamps();
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
