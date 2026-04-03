@props([
    'position' => 'bottom-start',
    'trigger' => null,
])

@php
    $alignmentClasses = match ($position) {
        'bottom-end' => 'top-100 end-0 mt-2',
        'top-start' => 'bottom-100 start-0 mb-2',
        'top-end' => 'bottom-100 end-0 mb-2',
        'right-start' => 'start-100 top-0 ms-2',
        'left-start' => 'end-100 top-0 me-2',
        default => 'top-100 start-0 mt-2', // bottom-start
    };
@endphp

<div 
    x-data="{ open: false }" 
    @keydown.escape.window="open = false" 
    class="position-relative d-inline-block text-start"
>
    <!-- Trigger -->
    @if ($trigger)
        <div @click="open = !open" role="button" aria-haspopup="dialog" :aria-expanded="open.toString()">
            {{ $trigger }}
        </div>
    @endif

    <!-- Popover Container -->
    <div 
        x-show="open" 
        x-cloak
        @click.outside="open = false"
        {{ $attributes->class(['position-absolute z-index-dropdown p-4 card shadow-xl border-1', $alignmentClasses]) }}
        style="width: max-content; max-width: 350px;"
        role="dialog"
    >
        @if ($trigger)
            {{ $slot }}
        @else
            <span class="text-danger small">A trigger named slot is required for Tabler Popover</span>
        @endif
    </div>
</div>
