<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecurityQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('security_question')->insert([
            [
                'user_id' => 1,
                'sq_question' => 'What is your favorite color?',
                'sq_answer' => 'Yellow',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
