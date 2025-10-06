<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default admin user
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Admin');
    }
}
