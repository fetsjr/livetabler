@props([
    'stacked' => true,
    'size' => 'md',
])

@php
    $classes = "flex items-center -space-x-2";
@endphp

<div {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</div>
