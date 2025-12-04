<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Route d'accueil
Route::get('/', [BookController::class, 'index'])->name('home');

// Routes CRUD 
Route::resource('books', BookController::class);

?>