@props([
    'variant' => 'block',
])

@php
    $classes = match ($variant) {
        'bare' => '',
        'inline' => 'mb-3 row',
        default => 'mb-3',
    };
@endphp

<div {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</div>
