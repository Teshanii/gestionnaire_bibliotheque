{{-- Composant pour afficher une statistique --}}
@props(['label', 'value', 'icon', 'color'])

<div class="card border-l-4 border-{{ $color }}-500">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-gray-600 mb-1">{{ $label }}</p>
            <p class="text-3xl font-bold">{{ $value }}</p>
        </div>
        <span class="text-5xl">{{ $icon }}</span>
    </div>
</div>
