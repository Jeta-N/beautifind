<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('review')->insert([
            [
                'user_id' => 1,
                'booking_id' => 1,
                'service_id' => 1,
                'rating' => 4.5,
                'review_content' => 'Hasilnya bagus, dekat rumah,  recommended',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'booking_id' => 2,
                'service_id' => 1,
                'rating' => 4.3,
                'review_content' => 'Hasilnya bagus, dekat rumah,  recommended',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
