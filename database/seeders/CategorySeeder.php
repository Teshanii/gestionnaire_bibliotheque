<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Fiction']);
        Category::create(['name' => 'Science-Fiction']);
        Category::create(['name' => 'Policier']);
        Category::create(['name' => 'Romance']);
        Category::create(['name' => 'Fantastique']);
        Category::create(['name' => 'Biographie']);
        Category::create(['name' => 'Histoire']);
    }
}
