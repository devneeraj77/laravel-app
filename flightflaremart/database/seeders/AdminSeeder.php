<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin
        Admin::factory()->create([
            'name' => 'admin',
            'email' => 'admin@flightfaremart.com',
            'password' => bcrypt('admin@Ui91CB)+1{8+'),
        ]);

        // Create random admins
        // Admin::factory(5)->create();
    }
}
