@props([
    'placeholder' => null,
    'invalid' => null,
])

@php
$classes = 'border-0 bg-transparent p-0 ps-1 small outline-0';

$name = $attributes->whereStartsWith('wire:model')->first();
$invalid ??= ($name && $errors->has($name));
@endphp

<input
    type="text"
    {{ $attributes->class($classes) }}
    @if ($invalid) aria-invalid="true" data-invalid @endif
    placeholder="{{ $placeholder }}"
    data-placeholder="{{ $placeholder }}"
    data-tabler-pillbox-input
    style="min-width: 3rem; flex: 1;"
>
