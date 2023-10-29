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
        Schema::create('service_price_range', function (Blueprint $table) {
            $table->id('spr_id');
            $table->foreignId('service_id')->constrained('service', 'service_id');
            $table->foreignId('pr_id')->constrained('price_range', 'pr_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_price_range');
    }
};
