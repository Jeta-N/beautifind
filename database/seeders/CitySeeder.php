<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('city')->insert([
            [
                'city_name' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'city_name' => 'Bandung',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'city_name' => 'Surabaya',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'city_name' => 'Denpasar',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
