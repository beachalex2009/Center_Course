<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'Ahmed Tawfik',
                'email' => 'beach_alex2009@yahoo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ]
        );
        User::create(
            [
                'name' => 'Amany Tawfik',
                'email' => 'Mony@yahoo.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ]
        );
    }
}
