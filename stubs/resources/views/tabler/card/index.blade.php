@props([
    'size' => null,     // sm or null (default)
    'variant' => null,  // blank, stacked, outline
])

@php
    $baseClasses = "flex flex-col relative bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 shadow-sm";

    $sizeClasses = match($size) {
        'sm' => "p-4 rounded-md",
        default => "p-6 rounded-lg",
    };

    if ($variant === 'outline') {
        $baseClasses = "flex flex-col relative bg-transparent border border-gray-200 dark:border-zinc-800";
    }

    $classes = "{$baseClasses} {$sizeClasses}";
@endphp

<div {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</div>
