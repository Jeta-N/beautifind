<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account')->insert([
            [
                'email' => 'user@gmail.com',
                'password' => Hash::make('userpass'),
                'account_role' => 'User',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'staff@gmail.com',
                'password' => Hash::make('staffpass'),
                'account_role' => 'Staff',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'websitemanager@gmail.com',
                'password' => Hash::make('websitepass'),
                'account_role' => 'Website Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin1@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin2@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin3@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin4@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin5@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin6@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin7@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin8@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin9@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin10@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'superadmin11@gmail.com',
                'password' => Hash::make('superpass'),
                'account_role' => 'Super Admin',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager1@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager2@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager3@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager4@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager5@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager6@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager7@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager8@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager9@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager10@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'manager11@gmail.com',
                'password' => Hash::make('managerpass'),
                'account_role' => 'Manager',
                'is_blocked' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
