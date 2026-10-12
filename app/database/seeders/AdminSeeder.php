<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Ahmed Emon',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'phone' => null,
                'address' => null,
                'profile_picture' => null,
                'details' => null,
                'remember_token' => null,
            ]
        );
    }
}
