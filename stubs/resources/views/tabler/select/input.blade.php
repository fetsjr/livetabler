@props([
    'placeholder' => null,
    'clearable' => null,
    'size' => null,
])

@php
$classes = Flux::classes()
    ->add('w-full bg-transparent outline-none')
    ->add(match($size ?? null) {
        'sm' => 'h-8 text-sm rounded-md px-3',
        default => 'h-10 text-base sm:text-sm rounded-lg px-3',
    })
    ->add('border border-zinc-200 dark:border-zinc-600')
    ->add('shadow-xs bg-white dark:bg-white/10')
    ->add('placeholder-zinc-400 dark:placeholder-zinc-400');
@endphp

<div class="relative w-full">
    <input
        type="text"
        {{ $attributes->class($classes) }}
        placeholder="{{ $placeholder }}"
        data-flux-select-input
    >

    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
        <svg class="h-4 w-4 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
        </svg>
    </span>
</div>
