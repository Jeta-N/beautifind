<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promotion')->insert([
            [
                'service_id' => 1,
                'image_path' => 'promoimage.jpg',
                'promo_title' => 'Birthday Discount',
                'promo_description' => 'Get 10% off for 7 days before or after your birthday.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
