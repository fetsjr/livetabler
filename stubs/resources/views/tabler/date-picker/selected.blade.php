@props([
    'placeholder' => 'No date selected',
])

<div {{ $attributes->class(['small text-muted']) }}>
    {{ $slot->isEmpty() ? $placeholder : $slot }}
</div>
