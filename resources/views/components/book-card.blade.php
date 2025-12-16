{{-- Composant pour afficher un livre --}}
@props(['book'])

<div class="book-item">
    <h3 class="text-xl font-bold mb-2">{{ $book->title }}</h3>
    
    <p class="text-gray-600 mb-1">
        <span class="font-semibold">Auteur :</span> {{ $book->author }}
    </p>
    
    <p class="text-gray-600 mb-4">
        <span class="font-semibold">Année :</span> {{ $book->published_year }}
    </p>
    
    @if($book->summary)
        <p class="text-gray-700 mb-4">{{ Str::limit($book->summary, 100) }}</p>
    @endif
    
    <a href="{{ route('books.show', $book) }}" class="btn btn-primary w-full">
        📖 Voir les détails
    </a>
</div>
