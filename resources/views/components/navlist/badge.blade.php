@props([
    'color' => 'secondary',
])

@php
$colorClass = match($color) {
    'blue'  => 'bg-primary-lt text-primary',
    'red'   => 'bg-danger-lt text-danger',
    default => 'bg-secondary-lt text-secondary',
};
@endphp

<span {{ $attributes->class(["badge rounded-pill small fw-medium $colorClass"]) }}>
    {{ $slot }}
</span>
