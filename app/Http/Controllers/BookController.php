<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        
        $query = Book::with('category');

        // Si y'a une recherche par titre/auteur
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Si y'a un filtre par catégorie
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // On récupère les résultats
        //$books = $query->latest()->get();
        $books = $query->latest()->paginate(12)->appends($request->query());

        return view('books.index', compact('books'));
    }


    // Formulaire de création
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    // Enregistrer un nouveau livre
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'summary' => 'nullable',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books',
            'category_id' => 'required'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Livre ajouté avec succès !');
    }

    // Afficher un livre
    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Formulaire d'édition
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // Mettre à jour un livre
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'summary' => 'nullable',
            'published_year' => 'required|integer',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'category_id' => 'required'
        ]);

        $book->update($validated);

        return redirect()->route('books.show', $book->id)
            ->with('success', 'Livre modifié avec succès !');
    }

    // Supprimer un livre
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Livre supprimé avec succès !');
    }
}

