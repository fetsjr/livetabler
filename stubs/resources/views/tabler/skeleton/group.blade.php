@props([
    'animate' => null,
])

<div {{ $attributes }} data-tabler-skeleton-group>
    {{ $slot }}
</div>
