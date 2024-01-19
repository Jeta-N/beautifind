<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee')->insert([
            [
                'account_id' => 3,
                'service_id' => 1,
                'emp_name' => 'Sandi',
                'emp_gender' => 'Female',
                'emp_birthdate' => '1999-11-03',
                'emp_phone_number' => '085688279375',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 4,
                'service_id' => 1,
                'emp_name' => 'Ryan',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
