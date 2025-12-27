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
            'name' => 'xxxxx xxx',
            'email' => 'xxxxx@xxx.xxx',
            'password' => bcrypt('xxx'),
        ]);

        // Create random admins
        // Admin::factory(5)->create();
    }
}
