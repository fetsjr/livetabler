@props([
    'placeholder' => 'No time selected',
])

<div {{ $attributes->class(['small text-muted']) }}>
    {{ $slot->isEmpty() ? $placeholder : $slot }}
</div>
