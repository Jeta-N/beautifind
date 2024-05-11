<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('booking')->insert([
            [
                'user_id' => 1,
                'service_id' => 1,
                'bs_id' => 1,
                'st_id' => 1,
                'price' => 120000,
                'booking_status' => 'Done',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'service_id' => 1,
                'bs_id' => 3,
                'st_id' => 5,
                'price' => 170000,
                'booking_status' => 'Upcoming',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'service_id' => 1,
                'bs_id' => 4,
                'st_id' => 1,
                'price' => 150000,
                'booking_status' => 'Done',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
