@props([
    'searchable' => null,
    'search' => null,
    'empty' => null,
])

@php
    $classes = 'dropdown-menu show shadow-lg border-1 overflow-auto';
@endphp

@if (! $searchable)
    <div {{ $attributes->class([$classes])->merge(['style' => 'max-height: 20rem; min-width: 200px;']) }} data-tabler-listbox-options>
        {{ $slot }}
    </div>
@else
    <div class="{{ $classes }}" style="min-width: 250px;" data-tabler-options>
        @if ($search)
            {{ $search }}
        @else
            <x-tabler::select.search />
        @endif

        <div class="overflow-auto" style="max-height: 20rem;">
            @if ($empty)
                {{ $empty }}
            @else
                <x-tabler::select.option.empty>No results found</x-tabler::select.option.empty>
            @endif

            {{ $slot }}
        </div>
    </div>
@endif
