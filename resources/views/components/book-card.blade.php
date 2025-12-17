@php
    $categorySlug = $book->category ? Str::slug($book->category->name) : 'default';
    $badgeClass = "badge-{$categorySlug}";
    $coverClass = "category-{$categorySlug}";
@endphp

<div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
    {{-- Couverture avec couleur --}}
    <div class="{{ $coverClass }} h-48 flex items-center justify-center text-white">
        <span class="text-6xl font-bold opacity-90">
            {{ substr($book->title, 0, 1) }}
        </span>
    </div>

    {{-- Infos --}}
    <div class="p-5">
        <h3 class="font-bold text-lg mb-2 truncate">{{ $book->title }}</h3>
        <p class="text-gray-600 text-sm mb-3">par {{ $book->author }}</p>

        @if($book->category)
            <span class="badge {{ $badgeClass }}">
                {{ $book->category->name }}
            </span>
        @endif

        <div class="mt-4">
            <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                Voir les détails →
            </a>
        </div>
    </div>
</div>
