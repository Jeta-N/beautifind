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
        Schema::create('service_service_type', function (Blueprint $table) {
            $table->id('sst_id');
            $table->foreignId('service_id')->constrained('service', 'service_id');
            $table->foreignId('st_id')->constrained('service_type', 'st_id');
            $table->integer('duration');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_service_type');
    }
};
