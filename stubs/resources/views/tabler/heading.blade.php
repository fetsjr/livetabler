@props([
    'level' => 1,
])

@php
    $classes = match((int) $level) {
        1 => 'text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl mb-6',
        2 => 'text-2xl font-semibold tracking-tight text-gray-900 dark:text-white mb-4',
        3 => 'text-xl font-semibold text-gray-900 dark:text-white mb-3',
        4 => 'text-lg font-medium text-gray-900 dark:text-white mb-2',
        5 => 'text-base font-medium text-gray-900 dark:text-white mb-1',
        default => 'text-base font-semibold text-gray-900 dark:text-white',
    };
    $tag = 'h' . min(max((int) $level, 1), 6);
@endphp

<{{ $tag }} {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</{{ $tag }}>
