<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSecurityQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_security_question')->insert([
            [
                'user_id' => 1,
                'sq_id' => 1,
                'sq_answer' => 'Yellow',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
