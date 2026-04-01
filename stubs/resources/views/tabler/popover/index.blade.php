@props([
    'position' => 'bottom-start', // e.g. bottom-start, bottom-end, top-start, etc.
    'trigger' => null,
])

@php
    $alignmentClasses = match ($position) {
        'bottom-end' => 'origin-top-right top-full right-0 mt-2',
        'top-start' => 'origin-bottom-left bottom-full left-0 mb-2',
        'top-end' => 'origin-bottom-right bottom-full right-0 mb-2',
        'right-start' => 'origin-top-left left-full top-0 ml-2',
        'left-start' => 'origin-top-right right-full top-0 mr-2',
        default => 'origin-top-left top-full left-0 mt-2', // bottom-start
    };
@endphp

<div 
    x-data="{ open: false }" 
    @keydown.escape.window="open = false" 
    class="relative inline-block text-left"
>
    <!-- Trigger -->
    @if ($trigger)
        <div @click="open = !open" role="button" aria-haspopup="dialog" :aria-expanded="open.toString()">
            {{ $trigger }}
        </div>
    @else
        <!-- Fallback if somebody uses simple slot instead of x-slot:trigger -->
    @endif

    <!-- Popover Container -->
    <div 
        x-show="open" 
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-1 scale-95"
        @click.outside="open = false"
        class="absolute z-50 {{ $alignmentClasses }} w-max max-w-sm rounded-lg border border-gray-200 bg-white p-4 shadow-xl dark:border-zinc-700 dark:bg-zinc-800"
        role="dialog"
    >
        <!-- The actual slot content for the popover body -->
        @if ($trigger)
            {{ $slot }}
        @else
            <!-- If no trigger was provided via named slot, we print slot as a fallback but this is not recommended -->
            <span class="text-red-500 font-bold border rounded p-2 text-xs">A `trigger` named slot is required for Tabler Popover</span>
        @endif
    </div>
</div>
