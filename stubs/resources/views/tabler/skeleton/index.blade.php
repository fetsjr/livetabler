@props([
    'variant' => 'line', // line, avatar, block, heading
])

@php
    $classes = match ($variant) {
        'avatar' => 'skeleton-avatar',
        'block' => 'skeleton-block',
        'heading' => 'skeleton-heading',
        default => 'skeleton-line',
    };
@endphp

<div {{ $attributes->class([$classes]) }} aria-hidden="true"></div>
