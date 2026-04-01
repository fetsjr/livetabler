@props([
    'variant' => 'text', // text, circle, rect
    'width' => 'w-full',
    'height' => 'h-4',
])

@php
    $baseClasses = "animate-pulse bg-gray-200 dark:bg-zinc-800";
    
    $shapeClasses = match ($variant) {
        'circle' => "rounded-full w-10 h-10",
        'rect' => "rounded-lg {$width} {$height}",
        default => "rounded {$width} {$height}", // text is just a rounded rect with variable widths
    };

    $classes = "{$baseClasses} {$shapeClasses}";
@endphp

<div {{ $attributes->class([$classes]) }} aria-hidden="true" data-tabler-skeleton></div>
