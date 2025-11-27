<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;

// Page d'accueil - Liste des livres
Route::get('/', function () {
    $books = Book::all();
    return view('books.index', compact('books'));
})->name('books.index');


// Afficher un livre
Route::get('/books/{id}', function ($id) {
    $book = Book::findOrFail($id);
    return view('books.show', compact('book'));
})->name('books.show');



