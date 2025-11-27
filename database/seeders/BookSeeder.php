<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Le Voleur de foudre',
            'author' => 'Rick Riordan',
            'year' => 2005,
            'isbn' => '978-2226186836',
            'description' => 'Percy Jackson découvre qu\'il est un demi-dieu, fils de Poséidon, et doit empêcher une guerre entre les dieux de l\'Olympe.'
        ]);
    }
}
