@props([
    'placeholder' => null,
    'invalid' => null,
])

@php
$classes = 'min-w-12 shrink flex-1 outline-none ms-1 placeholder-zinc-400 dark:placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:disabled:placeholder-zinc-500';

$name = $attributes->whereStartsWith('wire:model')->first();
$invalid ??= ($name && $errors->has($name));
@endphp

<input
    type="text"
    {{ $attributes->class($classes) }}
    @if ($invalid) aria-invalid="true" data-invalid @endif
    placeholder="{{ $placeholder }}"
    data-placeholder="{{ $placeholder }}"
    data-flux-pillbox-input
>
