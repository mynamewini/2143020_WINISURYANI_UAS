<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Create 3 Default Accounts 
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@rotiku.app',
            'phone' => '081234567890',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Operator',
            'username' => 'operator',
            'email' => 'operator@rotiku.app',
            'phone' => '081234567891',
            'password' => Hash::make('operator'),
            'role' => 'operator',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@rotiku.app',
            'phone' => '081234567892',
            'password' => Hash::make('user'),
            'role' => 'user',
        ]);
    }
}
