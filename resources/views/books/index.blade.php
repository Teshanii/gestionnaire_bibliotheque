<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        {{-- En-tête --}}
        <div class="flex justify-between items-center mb-8">
            <h1>📚 Tous les livres</h1>
            
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('books.create') }}" class="btn btn-primary">
                        ➕ Ajouter un livre
                    </a>
                @endif
            @endauth
        </div>

        {{-- Barre de recherche --}}
        <div class="mb-8">
            <form action="{{ route('books.index') }}" method="GET" class="flex gap-4">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Rechercher par titre ou auteur..." 
                    class="form-input flex-1"
                >
                <button type="submit" class="btn btn-primary">
                    🔍 Rechercher
                </button>
            </form>
        </div>

        {{-- Liste des livres --}}
        @if($books->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($books as $book)
                    <x-book-card :book="$book" />
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $books->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-xl text-gray-600">Aucun livre trouvé</p>
            </div>
        @endif
    </div>
</x-layout>
