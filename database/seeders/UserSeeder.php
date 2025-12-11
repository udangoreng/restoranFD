<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Customer1',
            'email' => 'user@example.com',
            'username' => 'user',
            'password' => Hash::make('password'),
            'phone' => '0987654321',
            'role' => 'customer',
        ]);
    }
}