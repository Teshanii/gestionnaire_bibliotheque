<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        <div class="flex justify-between items-center mb-8">
            <h1>📚 Catalogue des livres</h1>
            
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('books.create') }}" class="btn btn-primary">
                        + Ajouter un livre
                    </a>
                @endif
            @endauth
        </div>

        {{-- Barre de recherche --}}
        <form method="GET" class="mb-8">
            <div class="flex gap-4">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="🔍 Rechercher un livre ou un auteur..." 
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
                <button type="submit" class="btn btn-primary">
                    Rechercher
                </button>
                @if(request('search') || request('category'))
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                        Réinitialiser
                    </a>
                @endif
            </div>
        </form>

        {{-- Filtres catégories --}}
        <div class="flex flex-wrap gap-3 mb-8">
            <a href="{{ route('books.index') }}" 
               class="filter-link {{ !request('category') ? 'active' : '' }}">
                Toutes
            </a>
            @foreach($categories as $category)
                <a href="{{ route('books.index', ['category' => $category->id]) }}" 
                   class="filter-link {{ request('category') == $category->id ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        {{-- Grille livres --}}
        @if($books->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                @foreach($books as $book)
                    <x-book-card :book="$book" />
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $books->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">
                    Aucun livre trouvé pour cette recherche :(
                </p>
            </div>
        @endif
    </div>
</x-layout>
