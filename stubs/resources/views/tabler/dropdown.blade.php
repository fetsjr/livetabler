@props([
    'align' => 'right',
    'width' => 'w-56',
    'trigger' => null,
])

@php
    $alignmentClasses = match ($align) {
        'left' => 'origin-top-left left-0',
        'top' => 'origin-bottom mb-2 bottom-full',
        default => 'origin-top-right right-0 mt-2',
    };
@endphp

<div class="relative inline-block text-left" x-data="{ open: false }">
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <!-- Dropdown Menu Item Area overlay -->
    <div 
        x-show="open" 
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        class="absolute z-40 {{ $alignmentClasses }} {{ $width }} rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-zinc-800 dark:ring-white/10"
        role="menu" 
        aria-orientation="vertical" 
        tabindex="-1"
    >
        <div class="py-1 px-1" role="none" @click="open = false">
            {{ $slot }}
        </div>
    </div>
</div>
