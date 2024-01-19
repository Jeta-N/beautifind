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
            ],
            [
                'account_id' => 17,
                'service_id' => 2,
                'emp_name' => 'Manager 2',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 18,
                'service_id' => 3,
                'emp_name' => 'Manager 3',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 19,
                'service_id' => 4,
                'emp_name' => 'Manager 4',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 20,
                'service_id' => 5,
                'emp_name' => 'Manager 5',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 21,
                'service_id' => 6,
                'emp_name' => 'Manager 6',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 22,
                'service_id' => 7,
                'emp_name' => 'Manager 7',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 23,
                'service_id' => 8,
                'emp_name' => 'Manager 8',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 24,
                'service_id' => 9,
                'emp_name' => 'Manager 9',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 25,
                'service_id' => 10,
                'emp_name' => 'Manager 10',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 26,
                'service_id' => 11,
                'emp_name' => 'Manager 11',
                'emp_gender' => 'Male',
                'emp_birthdate' => '2000-08-25',
                'emp_phone_number' => '085799862279',
                'emp_image_path' => 'default-user.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'account_id' => 27,
                'service_id' => 12,
                'emp_name' => 'Manager 12',
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
