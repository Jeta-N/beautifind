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
            ],
            [
                'emp_id' => 3,
                'st_id' => 2,
                'price' => 125000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 4,
                'st_id' => 1,
                'price' => 185000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 4,
                'st_id' => 4,
                'price' => 225000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 4,
                'st_id' => 5,
                'price' => 155000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 5,
                'st_id' => 1,
                'price' => 175000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 5,
                'st_id' => 5,
                'price' => 195000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 6,
                'st_id' => 3,
                'price' => 125000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 6,
                'st_id' => 4,
                'price' => 135000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 7,
                'st_id' => 1,
                'price' => 205000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 7,
                'st_id' => 2,
                'price' => 105000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 8,
                'st_id' => 2,
                'price' => 165000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 9,
                'st_id' => 3,
                'price' => 295000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 10,
                'st_id' => 4,
                'price' => 145000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 11,
                'st_id' => 5,
                'price' => 195000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 12,
                'st_id' => 3,
                'price' => 175000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'emp_id' => 13,
                'st_id' => 3,
                'price' => 195000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
