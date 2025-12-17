<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {

    $totalBooks = \App\Models\Book::count();
    $totalUsers = \App\Models\User::count();

    $latestBooks = \App\Models\Book::latest()->take(3)->get();

    return view('home', compact('totalBooks', 'totalUsers', 'latestBooks'));
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
    Route::post('/register', [LoginController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $totalBooks = \App\Models\Book::count();
        $totalCategories = \App\Models\Category::count();
        $latestBooks = \App\Models\Book::with('category')->latest()->take(5)->get();

        return view('dashboard', compact('user', 'totalBooks', 'totalCategories', 'latestBooks'));
    })->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        $totalBooks = \App\Models\Book::count();
        $totalUsers = \App\Models\User::count();
        $totalCategories = \App\Models\Category::count();
        $latestBooks = \App\Models\Book::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalBooks', 'totalUsers', 'totalCategories', 'latestBooks'));
    })->name('admin.dashboard');

    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
