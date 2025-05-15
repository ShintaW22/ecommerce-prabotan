<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('shinta123'),
            'role' => 'admin',
        ]);

        // Buat beberapa user biasa
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('yusuf123'),
            'role' => 'user',
        ]);
    }
} 