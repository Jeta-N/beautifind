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
        Schema::create('employee', function (Blueprint $table) {
            $table->id('emp_id');
            $table->foreignId('account_id')->constrained('account', 'account_id');
            $table->foreignId('service_id')->constrained('service', 'service_id');
            $table->string('emp_name');
            $table->string('emp_gender');
            $table->date('emp_birthdate');
            $table->string('emp_phone_number');
            $table->string('emp_image_path');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
