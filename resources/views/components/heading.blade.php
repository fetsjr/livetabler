@props([
    'level' => 1,
])

@php
    $level = (int) $level;
    $tag = 'h' . min(max($level, 1), 6);
    $classes = match($level) {
        1 => 'h1 mb-3',
        2 => 'h2 mb-2',
        3 => 'h3 mb-2',
        4 => 'h4 mb-1',
        default => 'h5',
    };
@endphp

<{{ $tag }} {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</{{ $tag }}>
