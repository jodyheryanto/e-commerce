<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Role Seeder
        $this->call(RoleSeeder::class);

        //User Seeder
        $this->call(UserSeeder::class);
    }
}
