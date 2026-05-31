@props([
    'invalid' => null,
    'clear' => null,
    'close' => null,
    'size' => null,
    'name' => null,
])

<div {{ $attributes->class(['position-relative w-100']) }} data-tabler-select>
    {{ $slot }}
</div>
