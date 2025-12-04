<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier - {{ $book->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-2xl mx-auto px-4 py-8 w-full">
        
        <a href="/books/{{ $book->id }}" class="italic text-slate-500 hover:text-slate-700">
            ← Quitter la modification
        </a>

        <h1 class="mt-4 mb-6">Modifier le livre</h1>

        <form action="/books/{{ $book->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Titre du livre
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $book->title) }}"
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Auteur
                </label>
                <input 
                    type="text" 
                    name="author" 
                    value="{{ old('author', $book->author) }}"
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea 
                    name="description" 
                    rows="4"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >{{ old('description', $book->description) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Année de publication
                    </label>
                    <input 
                        type="number" 
                        name="year" 
                        value="{{ old('year', $book->year) }}"
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ISBN
                    </label>
                    <input 
                        type="text" 
                        name="isbn" 
                        value="{{ old('isbn', $book->isbn) }}"
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Enregistrer les modifications
            </button>
        </form>

        <div class="mt-8 pt-6 border-t">
            <form action="/books/{{ $book->id }}" method="POST"
                onsubmit="return confirm(' Êtes-vous sûr de vouloir supprimer ce livre ?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Supprimer ce livre
                </button>
            </form>
        </div>

    </div>
</body>
</html>
