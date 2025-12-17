<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">

        <h1 class="mb-8">Bonjour, {{ auth()->user()->name }} !</h1>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wide mb-2">
                            Livres dans la bibliothèque
                        </p>
                        <p class="text-4xl font-bold text-blue-600">
                            {{ $totalBooks }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wide mb-2">
                            Catégories disponibles
                        </p>
                        <p class="text-4xl font-bold text-green-600">
                            {{ $totalCategories }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Derniers livres --}}
        @if($latestBooks->count() > 0)
            <div>
                <h2 class="mb-6">🆕 Derniers livres ajoutés</h2>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    @foreach($latestBooks as $book)
                        @php
                            $categorySlug = $book->category ? Str::slug($book->category->name) : 'default';
                            $badgeClass = "badge-{$categorySlug}";
                        @endphp

                        <div class="flex justify-between items-center py-4 {{ !$loop->last ? 'border-b' : '' }}">
                            <div>
                                <h3 class="font-bold mb-1">{{ $book->title }}</h3>
                                <p class="text-gray-600 text-sm mb-2">par {{ $book->author }}</p>

                                @if($book->category)
                                    <span class="badge {{ $badgeClass }}">
                                        {{ $book->category->name }}
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('books.show', $book) }}" 
                               class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                                Voir →
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('books.index') }}" class="btn btn-primary">
                        Voir tous les livres
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
