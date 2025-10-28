<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Portal',
            'email' => 'admin@portalberita.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Jurnalis Portal',
            'email' => 'jurnalis@portalberita.com',
            'password' => bcrypt('jurnalis123'),
            'role' => 'journalist',
        ]);

        User::factory()->create([
            'name' => 'Pembaca Portal',
            'email' => 'pembaca@portalberita.com',
            'password' => bcrypt('pembaca123'),
            'role' => 'pembaca',
        ]);

        User::factory()->create([
            'name' => 'Pembaca Pertama',
            'email' => 'pertama@portalberita.com',
            'password' => bcrypt('password123'),
            'role' => 'pembaca',
        ]);
    }
}
