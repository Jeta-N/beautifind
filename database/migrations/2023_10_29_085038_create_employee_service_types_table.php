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
        Schema::create('employee_service_type', function (Blueprint $table) {
            $table->id('est_id');
            $table->foreignId('emp_id')->constrained('employee', 'emp_id');
            $table->foreignId('st_id')->constrained('service_type', 'st_id');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_service_type');
    }
};
