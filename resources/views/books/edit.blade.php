<x-layout>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h1 class="mb-8"> Modifier "{{ $book->title }}"</h1>

        {{-- Messages d'erreur --}}
        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg mb-6">
                <ul class="list-inside mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg p-8">
            <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Titre --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Titre du livre *
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        value="{{ old('title', $book->title) }}" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Auteur --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Auteur *
                    </label>
                    <input 
                        type="text" 
                        name="author" 
                        value="{{ old('author', $book->author) }}" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                    @error('author')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ISBN --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        ISBN *
                    </label>
                    <input 
                        type="text" 
                        name="isbn" 
                        value="{{ old('isbn', $book->isbn) }}" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                    @error('isbn')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Année --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Année de publication *
                    </label>
                    <input 
                        type="number" 
                        name="published_year" 
                        value="{{ old('published_year', $book->published_year) }}" 
                        required 
                        min="1000" 
                        max="{{ date('Y') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                    @error('published_year')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Catégorie --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Catégorie *
                    </label>
                    <select 
                        name="category_id" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Résumé --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Résumé (optionnel)
                    </label>
                    <textarea 
                        name="summary" 
                        rows="4" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >{{ old('summary', $book->summary) }}</textarea>
                    @error('summary')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Boutons --}}
                <div class="flex gap-4">
                    <button type="submit" class="btn btn-primary flex-1">
                         Enregistrer les modifications
                    </button>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-secondary">
                        Annuler
                    </a>
                </div>
            </form>

            
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
        </div>
    </div>
</x-layout>
