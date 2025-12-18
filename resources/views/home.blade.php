<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">

        {{-- Bannière de bienvenue --}}
        <div class="text-center py-16">
            <h1 class="text-5xl font-bold mb-4">
                Bienvenue dans La Bibliothèque
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Découvrez et gérez votre collection de livres
            </p>

            @guest
                <a href="{{ route('register') }}" class="btn btn-primary text-lg px-8 py-3">
                    Créer un compte gratuit
                </a>
            @endguest
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
            <x-stat-card 
                label="Livres disponibles" 
                :value="$totalBooks" 
                icon="📚" 
                color="blue" 
            />

            <x-stat-card 
                label="Membres inscrits" 
                :value="$totalUsers" 
                icon="👥" 
                color="green" 
            />
        </div>

        {{-- Derniers livres --}}
        @if($latestBooks->count() > 0)
            <div>
                <h2 class="mb-8 text-center">
                    Derniers livres ajoutés
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($latestBooks as $book)
                        <x-book-card :book="$book" />
                    @endforeach
                </div>
            </div>
        @endif

        
        <div class="text-center py-12 bg-blue-50 rounded-2xl mt-16">
            <h2 class="mb-4">Prêt à découvrir plus de livres ?</h2>
            <p class="text-gray-600 mb-6">
                Explorez notre collection complète
            </p>

            @auth
                <a href="{{ route('books.index') }}" class="btn btn-primary inline-block">
                    Voir tous les livres
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary inline-block">
                     Créer un compte
                </a>
            @endauth
        </div>
    </div>
</x-layout>
 