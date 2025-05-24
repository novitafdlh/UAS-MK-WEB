<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin2@gmail.com'],
            [
                'name' => 'Admin 2',
                'password' => Hash::make('admin321'),
                'role' => 'admin',
            ]
        );
    }
}
