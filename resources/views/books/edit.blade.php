<x-layout>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <h1 class="mb-6">✏️ Modifier le livre</h1>

        {{-- Messages d'erreur --}}
        @if($errors->any())
            <div class="alert alert-error mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Titre --}}
                <div>
                    <label for="title" class="form-label">
                        📖 Titre du livre *
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title', $book->title) }}"
                        class="form-input"
                        required
                    >
                </div>

                {{-- Auteur --}}
                <div>
                    <label for="author" class="form-label">
                        ✍️ Auteur *
                    </label>
                    <input 
                        type="text" 
                        id="author" 
                        name="author" 
                        value="{{ old('author', $book->author) }}"
                        class="form-input"
                        required
                    >
                </div>

                {{-- Catégorie --}}
                <div>
                    <label for="category_id" class="form-label">
                        🏷️ Catégorie *
                    </label>
                    <select 
                        id="category_id" 
                        name="category_id"
                        class="form-input"
                        required
                    >
                        <option value="">-- Choisir une catégorie --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Résumé --}}
                <div>
                    <label for="summary" class="form-label">
                        📝 Résumé
                    </label>
                    <textarea 
                        id="summary" 
                        name="summary" 
                        rows="4"
                        class="form-input"
                    >{{ old('summary', $book->summary) }}</textarea>
                </div>

                {{-- Année de publication --}}
                <div>
                    <label for="published_year" class="form-label">
                        📅 Année de publication *
                    </label>
                    <input 
                        type="number" 
                        id="published_year" 
                        name="published_year" 
                        value="{{ old('published_year', $book->published_year) }}"
                        class="form-input"
                        required
                    >
                </div>

                {{-- ISBN --}}
                <div>
                    <label for="isbn" class="form-label">
                        🔢 ISBN *
                    </label>
                    <input 
                        type="text" 
                        id="isbn" 
                        name="isbn" 
                        value="{{ old('isbn', $book->isbn) }}"
                        class="form-input"
                        required
                    >
                </div>

                {{-- Boutons --}}
                <div class="flex gap-4">
                    <button type="submit" class="btn btn-primary">
                        ✅ Enregistrer
                    </button>

                    <a href="{{ route('books.show', $book) }}" class="btn btn-secondary">
                        ❌ Annuler
                    </a>
                </div>
            </form>

            {{-- Formulaire de suppression --}}
            <div class="mt-6 pt-6 border-t">
                <form action="{{ route('books.destroy', $book) }}" method="POST"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        🗑️ Supprimer ce livre
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
