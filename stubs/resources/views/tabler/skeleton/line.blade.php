@props([
    'size' => 'base',
    'animate' => 'pulse',
])

@php
    $classes = "skeleton";
    if ($animate === 'pulse') { $classes .= ' skeleton-pulse'; }
@endphp

<div {{ $attributes->class([$classes]) }} style="height: {{ $size === 'lg' ? '1.5rem' : '1.25rem' }};">
    {{ $slot }}
</div>
