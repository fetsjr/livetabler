@props([
    'text' => null,
    'position' => 'top', // top, bottom, left, right
])

@php
    $positionClasses = match($position) {
        'bottom' => 'top-full mt-2 left-1/2 -translate-x-1/2',
        'left' => 'right-full mr-2 top-1/2 -translate-y-1/2',
        'right' => 'left-full ml-2 top-1/2 -translate-y-1/2',
        default => 'bottom-full mb-2 left-1/2 -translate-x-1/2', // top
    };
@endphp

<div 
    x-data="{ tooltip: false }" 
    @mouseenter="tooltip = true" 
    @mouseleave="tooltip = false" 
    @focus="tooltip = true" 
    @blur="tooltip = false" 
    class="relative inline-flex"
>
    <!-- Element that triggers tooltip -->
    {{ $slot }}

    <!-- Tooltip Bubble -->
    <div 
        x-show="tooltip" 
        x-cloak 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 whitespace-nowrap rounded bg-gray-900 px-2 py-1 text-xs font-medium text-white shadow-sm dark:bg-zinc-700 w-max {{ $positionClasses }}"
        role="tooltip"
        aria-hidden="true"
        x-bind:aria-hidden="(!tooltip).toString()"
    >
        {{ $text }}
    </div>
</div>
