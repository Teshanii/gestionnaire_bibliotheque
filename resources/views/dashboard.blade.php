<x-layout>
    <div class="max-w-6xl mx-auto px-4 py-8">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl shadow-lg p-8 mb-8">
            <h1 class="mb-2">👋 Bienvenue {{ auth()->user()->name }} !</h1>
            <p class="text-blue-100">Votre espace personnel</p>
        </div>

        {{-- Stats avec composants --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <x-stat-card 
                label="Total des livres" 
                :value="\App\Models\Book::count()" 
                icon="📚" 
                color="blue" 
            />

            <x-stat-card 
                label="Votre statut" 
                :value="auth()->user()->role === 'admin' ? '👑 Admin' : '👤 Utilisateur'" 
                :icon="auth()->user()->role === 'admin' ? '👑' : '👤'" 
                color="green" 
            />
        </div>

        {{-- Livres récents --}}
        <div class="card">
            <h2 class="mb-6 text-gray-900">📖 Derniers livres ajoutés</h2>

            <div class="space-y-4">
                @forelse($recentBooks as $book)
                    <div class="book-item">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">{{ $book->title }}</h3>
                                <p class="text-sm text-gray-600">✍️ {{ $book->author }} • 📅 {{ $book->published_year }}</p>
                            </div>
                            <a href="{{ route('books.show', $book) }}" 
                               class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                                Voir →
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Aucun livre pour le moment</p>
                @endforelse
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('books.index') }}" class="btn btn-primary">
                    📚 Voir tous les livres
                </a>
            </div>
        </div>
    </div>
</x-layout>
