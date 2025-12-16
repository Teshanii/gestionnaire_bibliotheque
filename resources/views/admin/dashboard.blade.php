<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        <h1 class="mb-8">🔐 Dashboard Admin</h1>

        {{-- Statistiques --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <x-stat-card 
                label="Utilisateurs" 
                :value="$totalUsers" 
                icon="👥" 
                color="blue" 
            />
            
            <x-stat-card 
                label="Livres" 
                :value="$totalBooks" 
                icon="📚" 
                color="green" 
            />
            
            <x-stat-card 
                label="Admins" 
                :value="$adminUsers" 
                icon="👑" 
                color="red" 
            />
            
            <x-stat-card 
                label="Users" 
                :value="$regularUsers" 
                icon="👤" 
                color="purple" 
            />
        </div>

        {{-- Derniers livres --}}
        <div class="card">
            <h2 class="mb-6">📖 Derniers livres ajoutés</h2>
            
            <div class="space-y-4">
                @foreach($recentBooks as $book)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-bold">{{ $book->title }}</p>
                            <p class="text-sm text-gray-600">par {{ $book->author }}</p>
                        </div>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-primary">
                            Voir
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
