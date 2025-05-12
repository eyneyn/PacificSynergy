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
            'employee_number' => 'PD004',
            'last_name' => 'Senior',
            'first_name' => 'User',
            'department' => 'Production Department',
            'photo' => 'uploads/photos/senior.jpg',
            'email' => 'senior@example.com',
            'password' => 'Pacific123.',
            'is_role' => '0',
        ]);
        User::factory()->create([
            'employee_number' => 'PD003',
            'last_name' => 'Analyst',
            'first_name' => 'User',
            'department' => 'Production Department',
            'photo' => 'uploads/photos/analyst.jpg',
            'email' => 'analyst@example.com',
            'password' => 'Pacific123.',
            'is_role' => '1',
        ]);
        User::factory()->create([
            'employee_number' => 'PD002',
            'last_name' => 'Manager',
            'first_name' => 'User',
            'department' => 'Production Department',
            'photo' => 'uploads/photos/manager.jpg',
            'email' => 'manager@example.com',
            'password' => 'Pacific123.',
            'is_role' => '2',
        ]);
            User::factory()->create([
            'employee_number' => 'PD001',
            'last_name' => 'Admin',
            'first_name' => 'User',
            'department' => 'Production Department',
            'photo' => 'uploads/photos/admin.jpg',
            'email' => 'admin@example.com',
            'password' => 'Pacific123.',
            'is_role' => '3',
        ]);
    }
}
