<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-8">
            <h1>🔐 Dashboard Admin</h1>
            <a href="{{ route('books.create') }}" class="btn btn-primary">
                 Ajouter un livre
            </a>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wide mb-2">
                            Total Livres
                        </p>
                        <p class="text-4xl font-bold text-blue-600">
                            {{ $totalBooks }}
                        </p>
                    </div>
                    <div class="text-5xl">📚</div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wide mb-2">
                            Catégories
                        </p>
                        <p class="text-4xl font-bold text-green-600">
                            {{ $totalCategories }}
                        </p>
                    </div>
                    <div class="text-5xl">🏷️</div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium uppercase tracking-wide mb-2">
                            Utilisateurs
                        </p>
                        <p class="text-4xl font-bold text-purple-600">
                            {{ $totalUsers }}
                        </p>
                    </div>
                    <div class="text-5xl">👥</div>
                </div>
            </div>
        </div>

        {{-- Derniers livres --}}
        @if($latestBooks->count() > 0)
            <div>
                <h2 class="mb-6">🆕 Derniers livres ajoutés</h2>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="text-left p-4 font-semibold text-gray-700">Titre</th>
                                <th class="text-left p-4 font-semibold text-gray-700">Auteur</th>
                                <th class="text-left p-4 font-semibold text-gray-700">Catégorie</th>
                                <th class="text-left p-4 font-semibold text-gray-700">Année</th>
                                <th class="text-right p-4 font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestBooks as $book)
                                @php
                                    $categorySlug = $book->category ? Str::slug($book->category->name) : 'default';
                                    $badgeClass = "badge-{$categorySlug}";
                                @endphp

                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4 font-medium">{{ $book->title }}</td>
                                    <td class="p-4 text-gray-600">{{ $book->author }}</td>
                                    <td class="p-4">
                                        @if($book->category)
                                            <span class="badge {{ $badgeClass }}">
                                                {{ $book->category->name }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-gray-600">{{ $book->published_year }}</td>
                                    <td class="p-4 text-right space-x-2">
                                        <a href="{{ route('books.show', $book) }}" 
                                           class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                                            Voir
                                        </a>
                                        <a href="{{ route('books.edit', $book) }}" 
                                           class="text-green-600 hover:text-green-700 font-medium text-sm">
                                            Modifier
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('books.index') }}" class="btn btn-primary">
                        📚 Voir tous les livres
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
