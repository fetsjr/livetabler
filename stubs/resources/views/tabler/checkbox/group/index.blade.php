@props([
    'variant' => 'default',
])

<div {{ $attributes->class(['flex flex-col gap-2']) }}>
    {{ $slot }}
</div>
