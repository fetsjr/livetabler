@props([
    'placeholder' => null,
    'suffix' => null,
    'max' => null,
])

@php
$classes = Flux::classes()
    ->add('overflow-hidden flex gap-2 text-start flex-1')
    ->add('text-zinc-700 dark:text-zinc-300')
    ->add('truncate');
@endphp

<span {{ $attributes->class($classes) }} data-flux-select-selected>
    @if ($placeholder)
        <span class="text-zinc-400" data-flux-select-placeholder>{{ $placeholder }}</span>
    @endif

    {{ $slot }}
</span>
