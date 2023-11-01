<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_type')->insert([
            [
                'st_name' => 'Female Haircut',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'st_name' => 'Male Haircut',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'st_name' => 'Manicure',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'st_name' => 'Pedicure',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'st_name' => 'Nail Art',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
