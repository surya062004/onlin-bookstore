<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name'     => 'Admin',
            'email'    => 'admin@bookstore.com',
            'password' => Hash::make('password123'),
            'is_admin' => true,
        ]);
    }
}
