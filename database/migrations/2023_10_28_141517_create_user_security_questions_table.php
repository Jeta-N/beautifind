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
        Schema::create('user_security_question', function (Blueprint $table) {
            $table->id('usq_id');
            $table->foreignId('user_id')->constrained('user', 'user_id');
            $table->foreignId('sq_id')->constrained('security_question', 'sq_id');
            $table->string('sq_answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_security_question');
    }
};
