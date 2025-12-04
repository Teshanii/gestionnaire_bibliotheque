<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-2xl mx-auto px-4 py-8 w-full">
        
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6 shadow">
                <p class="font-medium"> {{ session('success') }}</p>
            </div>
        @endif

        <a href="/" class="italic text-slate-500 hover:text-slate-700">
            ← Retour aux livres
        </a>

        <div class="w-full flex justify-between gap-4 mt-4 mb-6">  
            <h1>{{ $book->title }}</h1>
            <a href="/books/{{ $book->id }}/edit" class="btn btn-primary">
                Modifier
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600 font-semibold mb-1">Auteur</p>
                    <p class="text-gray-800 text-lg"> {{ $book->author }}</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600 font-semibold mb-1">Année de publication</p>
                    <p class="text-gray-800"> {{ $book->year }}</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600 font-semibold mb-1">ISBN</p>
                    <p class="text-gray-800 font-mono">{{ $book->isbn }}</p>
                </div>

                @if($book->description)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600 font-semibold mb-2">Description</p>
                        <p class="text-gray-700 leading-relaxed">{{ $book->description }}</p>
                    </div>
                @endif
            </div>

        </div>

        <div class="mt-6 pt-6 border-t">
            <form action="/books/{{ $book->id }}" method="POST"
                onsubmit="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer ce livre ?')">
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

