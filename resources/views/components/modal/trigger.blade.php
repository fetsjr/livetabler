@props([
    'shortcut' => null,
    'name' => null,
])

<div
    {{ $attributes->class('contents') }}
    x-data
    x-on:click="$dispatch('modal-show', '{{ $name }}')"
    @if ($shortcut)
        x-on:keydown.{{ $shortcut }}.document="$event.preventDefault(); $dispatch('modal-show', '{{ $name }}')"
    @endif
>
    {{ $slot }}
</div>
