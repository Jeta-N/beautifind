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
        Schema::create('user_service_type', function (Blueprint $table) {
            $table->id('ust_id');
            $table->foreignId('user_id')->constrained('user', 'user_id');
            $table->foreignId('st_id')->constrained('service_type', 'st_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_service_types');
    }
};
