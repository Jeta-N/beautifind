<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->insert([
            [
                'service_id' => 1,
                'faq_question' => 'What is nail art?',
                'faq_answer' => 'Nail art is a creative way to paint, decorate, enhance, and embellish nails.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
