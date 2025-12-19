<?php

namespace Database\Seeders;
use App\Models\Category as CategoryModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         CategoryModel::factory()->count(10)->create();
    }
}
