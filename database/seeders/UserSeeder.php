<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@inventaris.test',
            'password' => Hash::make('password123'), // Menggunakan Hash untuk password[cite: 6]
            'role_id' => 1 // ID untuk Admin
        ]);
    }
}