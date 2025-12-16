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
        $sciFi = Category::where('name', 'Science-Fiction')->first();
        $fantasy = Category::where('name', 'Fantasy')->first();
        $thriller = Category::where('name', 'Thriller')->first();
        
        Book::create([
            'title' => 'Le Voleur de foudre',
            'author' => 'Rick Riordan',
            'published_year' => 2005,
            'isbn' => '978-2226186836',
            'summary' => 'Percy Jackson découvre qu\'il est un demi-dieu, fils de Poséidon, et doit empêcher une guerre entre les dieux de l\'Olympe.',
            'category_id' => $fantasy->id,
        ]);
    }
}
