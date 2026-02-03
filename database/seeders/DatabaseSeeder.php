<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@mmsu.edu.ph',
            'password' => Hash::make('password'), // The password is "password"
        ]);
    }
}