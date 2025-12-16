<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <a href="{{ route('books.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold mb-6 inline-block">
            ← Retour à la liste
        </a>

        <div class="card">
            {{-- Image de couverture --}}
            <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-center py-16 rounded-t-xl">
                <span class="text-8xl">📖</span>
            </div>

            {{-- Contenu --}}
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="mb-3">{{ $book->title }}</h1>
                        <p class="text-xl text-gray-600">✍️ {{ $book->author }}</p>

                        {{-- Badge catégorie --}}
                        @if($book->category)
                            <div class="mt-3">
                                <span class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">
                                    🏷️ {{ $book->category->name }}
                                </span>
                            </div>
                        @endif
                    </div>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('books.edit', $book) }}" class="btn bg-yellow-500 hover:bg-yellow-600 text-white">
                                ✏️ Modifier
                            </a>
                        @endif
                    @endauth
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600 font-semibold mb-2">📅 Année de publication</p>
                        <p class="text-lg text-gray-900">{{ $book->published_year }}</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600 font-semibold mb-2">🔢 ISBN</p>
                        <p class="text-lg text-gray-900">{{ $book->isbn }}</p>
                    </div>
                </div>

                @if($book->summary)
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <p class="text-sm text-gray-700 font-semibold mb-3">📝 Résumé</p>
                        <p class="text-gray-800 leading-relaxed">{{ $book->summary }}</p>
                    </div>
                @endif

                @auth
                    @if(auth()->user()->role === 'admin')
                        <div class="mt-8 pt-6 border-t">
                            <form action="{{ route('books.destroy', $book) }}" method="POST"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    🗑️ Supprimer ce livre
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</x-layout>
