@props([
    'invalid' => null,
    'clear' => null,
    'close' => null,
    'size' => null,
    'name' => null,
])

<div {{ $attributes->class(['relative w-full']) }} data-flux-select>
    {{ $slot }}
</div>
