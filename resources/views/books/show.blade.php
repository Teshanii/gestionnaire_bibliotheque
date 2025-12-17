<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        
        <a href="{{ route('books.index') }}" class="text-blue-600 hover:text-blue-700 font-medium mb-6 inline-block">
            ← Retour au catalogue
        </a>

        @php
            $categorySlug = $book->category ? Str::slug($book->category->name) : 'default';
            $badgeClass = "badge-{$categorySlug}";
            $coverClass = "category-{$categorySlug}";
        @endphp

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            {{-- Couverture --}}
            <div class="{{ $coverClass }} h-64 flex items-center justify-center text-white">
                <span class="text-9xl font-bold opacity-90">
                    {{ substr($book->title, 0, 1) }}
                </span>
            </div>

            <div class="p-8">
                {{-- Titre + Bouton modifier --}}
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="mb-3">{{ $book->title }}</h1>
                        <p class="text-xl text-gray-600">par {{ $book->author }}</p>

                        {{-- Badge catégorie --}}
                        @if($book->category)
                            <span class="badge {{ $badgeClass }} mt-3">
                                {{ $book->category->name }}
                            </span>
                        @endif
                    </div>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">
                                Modifier
                            </a>
                        @endif
                    @endauth
                </div>

                {{-- Infos --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Année de publication</p>
                        <p class="text-lg font-bold">{{ $book->published_year }}</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">ISBN</p>
                        <p class="text-lg font-mono">{{ $book->isbn }}</p>
                    </div>
                </div>

                {{-- Résumé --}}
                @if($book->summary)
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="mb-3"> Résumé</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $book->summary }}</p>
                    </div>
                @endif

                {{-- Zone danger --}}
                @auth
                    @if(auth()->user()->role === 'admin')
                        <div class="mt-8 pt-8 border-t-2 border-red-200">
                            <form action="{{ route('books.destroy', $book) }}" method="POST" 
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Supprimer ce livre
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</x-layout>
