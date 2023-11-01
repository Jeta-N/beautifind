<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_service_type')->insert([
            [
                'emp_id' => 1,
                'st_id' => 1,
                'price' => 120000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 1,
                'st_id' => 2,
                'price' => 100000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 2,
                'st_id' => 5,
                'price' => 170000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
