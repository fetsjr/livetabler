@props([
    'icon' => null,
])

<div {{ $attributes->class(['flex items-center gap-2 text-sm font-medium']) }} data-slot="heading">
    {{ $slot }}
</div>
