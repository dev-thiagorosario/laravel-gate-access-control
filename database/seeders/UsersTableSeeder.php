<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create([
                'role' => 'user',
                'password' => Hash::make('Aa123'),
            ]);

        User::factory()
            ->count(5)
            ->create([
                'role' => 'admin',
                'password' => Hash::make('admin123'),
            ]);

        User::factory()
            ->count(5)
            ->create([
                'role' => 'visitor',
                'password' => Hash::make('Aa123'),
            ]);
    }
}
