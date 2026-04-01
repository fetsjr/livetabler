@props([
    'orientation' => 'horizontal', // horizontal, vertical
    'vertical' => false,
    'text' => null,
])

@php
    $orientation = $vertical ? 'vertical' : 'horizontal';

    $baseClasses = "border-0 shadow-none";
    $colorClass = "bg-gray-200 dark:bg-zinc-800"; // Tabler uses subtle gray borders
    
    $classes = match($orientation) {
        'vertical' => "{$baseClasses} {$colorClass} self-stretch self-center w-[1px]",
        default => "{$baseClasses} {$colorClass} h-[1px] w-full",
    };
@endphp

@if ($text)
    <div data-orientation="{{ $orientation }}" class="flex items-center w-full my-4" role="none">
        <div class="{{ $classes }} grow"></div>
        <span class="shrink mx-4 font-medium text-xs tracking-wide text-gray-500 uppercase dark:text-gray-400 whitespace-nowrap">
            {{ $text }}
        </span>
        <div class="{{ $classes }} grow"></div>
    </div>
@else
    <div data-orientation="{{ $orientation }}" role="none" class="{{ $classes }} shrink-0 my-4"></div>
@endif
