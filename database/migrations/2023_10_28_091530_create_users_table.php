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
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->foreignId('account_id')->constrained('account', 'account_id');
            $table->string('user_name');
            $table->string('user_gender');
            $table->date('user_birthdate');
            $table->string('user_phone_number');
            $table->foreignId('city_id')->constrained('city', 'city_id');
            $table->string('user_image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
