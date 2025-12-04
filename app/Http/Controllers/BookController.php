<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    
    public function create()
    {
        return view('books.create');
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer',
            'isbn' => 'required|string|unique:books,isbn',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Livre ajouté avec succès !');
    }

    
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'required|integer',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
        ]);

        $book->update($validated);

        return redirect()->route('books.show', $book->id)
            ->with('success', 'Livre modifié avec succès !');
    }

    
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Livre supprimé avec succès !');
    }
}
