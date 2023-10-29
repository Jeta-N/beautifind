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
        Schema::create('booking_slot', function (Blueprint $table) {
            $table->id('bs_id');
            $table->foreignId('emp_id')->constrained('employee', 'emp_id');
            $table->foreignId('service_id')->constrained('service', 'service_id');
            $table->date('date');
            $table->timestamp('time_start')->nullable();
            $table->timestamp('time_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_slot');
    }
};
