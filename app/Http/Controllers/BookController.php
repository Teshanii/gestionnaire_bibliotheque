<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Afficher la liste des livres avec recherche et filtre
    public function index(Request $request)
    {
        // Récupérer les catégories pour le filtre
        $categories = Category::all();
        
        // Commencer la requête
        $books = Book::query();

        // Si y'a une recherche par titre ou auteur
        if ($request->search) {
            $search = $request->search;
            $books->where('title', 'like', "%$search%")
                  ->orWhere('author', 'like', "%$search%");
        }

        // Si y'a un filtre par catégorie
        if ($request->category) {
            $books->where('category_id', $request->category);
        }

        // Récupérer les résultats avec pagination
        $books = $books->latest()->paginate(12);

        return view('books.index', compact('books', 'categories'));
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
            'category_id' => 'required|exists:categories,id'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Livre ajouté avec succès !');
    }

    // Afficher un livre
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
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
            'category_id' => 'required|exists:categories,id'
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
