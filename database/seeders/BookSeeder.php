<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fiction = Category::where('name', 'Fiction')->first();
        $scifi = Category::where('name', 'Science-Fiction')->first();
        $policier = Category::where('name', 'Policier')->first();
        $romance = Category::where('name', 'Romance')->first();
        $fantastique = Category::where('name', 'Fantastique')->first();

        Book::create([
            'title' => 'Le Voleur de foudre',
            'author' => 'Rick Riordan',
            'published_year' => 2005,
            'isbn' => '978-2226186836',
            'summary' => 'Percy Jackson découvre qu\'il est un demi-dieu, fils de Poséidon, et doit empêcher une guerre entre les dieux de l\'Olympe.',
            'category_id' => $fiction->id,
        ]);
    }
}
