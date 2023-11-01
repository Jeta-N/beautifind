<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('booking_slot')->insert([
            [
                'emp_id' => 1,
                'service_id' => 1,
                'date' => '2023-11-01',
                'time_start' => '2023-11-01 10:00:00',
                'time_end' => '2023-11-01 11:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 1,
                'service_id' => 1,
                'date' => '2023-11-07',
                'time_start' => '2023-11-07 11:00:00',
                'time_end' => '2023-11-07 12:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 2,
                'service_id' => 1,
                'date' => '2023-11-07',
                'time_start' => '2023-11-07 13:00:00',
                'time_end' => '2023-11-07 14:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
