<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-4xl mx-auto px-4 py-8">
        
        <!-- En-tête avec gradient -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg p-8 mb-8">
            <h1 class="text-white mb-2">📚 Ma Bibliothèque</h1>
            <p class="text-blue-100">Gérez votre collection de livres</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6 shadow">
                <p class="font-medium">✅ {{ session('success') }}</p>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2>Mes livres ({{ count($books) }})</h2>
            <a href="/books/create" class="btn btn-primary">
                ➕ Ajouter un livre
            </a>
        </div>

        @if(count($books) > 0)
            <div class="space-y-4">
                @foreach($books as $book)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition border-l-4 border-blue-500">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <a href="/books/{{ $book->id }}" 
                                   class="text-xl font-bold text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $book->title }}
                                </a>
                                <p class="text-gray-600 mt-2">
                                    <span class="font-medium">👤 {{ $book->author }}</span> 
                                    <span class="text-gray-400">•</span>
                                    <span>📅 {{ $book->year }}</span>
                                </p>
                                @if($book->description)
                                    <p class="text-gray-500 text-sm mt-3">
                                        {{ Str::limit($book->description, 120) }}
                                    </p>
                                @endif
                            </div>
                            <a href="/books/{{ $book->id }}" class="btn btn-primary ml-4">
                                Voir →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <p class="text-gray-500 text-lg mb-4">📭 Aucun livre dans la bibliothèque.</p>
                <a href="/books/create" class="btn btn-primary">
                    Ajouter le premier livre
                </a>
            </div>
        @endif
    </div>
</body>
</html>

