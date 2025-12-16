<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Fantasy']);
        Category::create(['name' => 'Science-Fiction']);
        Category::create(['name' => 'Thriller']);
        Category::create(['name' => 'Romance']);
        Category::create(['name' => 'Biographie']);
    }
}
