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
                'time_start' => '10:00:00',
                'time_end' => '11:00:00',
                'is_available' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 1,
                'service_id' => 1,
                'date' => '2023-11-07',
                'time_start' => '11:00:00',
                'time_end' => '12:00:00',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 2,
                'service_id' => 1,
                'date' => '2023-11-07',
                'time_start' => '13:00:00',
                'time_end' => '14:00:00',
                'is_available' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
