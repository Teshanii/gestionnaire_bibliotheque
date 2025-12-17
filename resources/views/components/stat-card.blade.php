@props(['label', 'value', 'icon', 'color' => 'blue'])

<div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-gray-600 text-sm font-medium uppercase tracking-wide mb-2">
                {{ $label }}
            </p>
            <p class="text-4xl font-bold text-{{ $color }}-600">
                {{ $value }}
            </p>
        </div>
        <div class="text-5xl">
            {{ $icon }}
        </div>
    </div>
</div>
