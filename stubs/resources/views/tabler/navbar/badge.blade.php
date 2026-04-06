@props([
    'color' => 'secondary',
])

@php
$colorClass = match($color) {
    'blue'  => 'bg-primary-lt text-primary',
    'red'   => 'bg-danger-lt text-danger',
    'green' => 'bg-success-lt text-success',
    default => 'bg-secondary-lt text-secondary',
};
@endphp

<span {{ $attributes->class(["badge rounded-pill small fw-medium $colorClass"]) }}>
    {{ $slot }}
</span>
