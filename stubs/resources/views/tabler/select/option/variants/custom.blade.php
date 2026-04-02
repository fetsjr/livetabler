@props([
    'filterable' => null,
    'indicator' => null,
    'loading' => null,
    'label' => null,
    'value' => null,
])

@php
$classes = 'group/option overflow-hidden data-hidden:hidden group flex items-center px-2 py-1.5 w-full focus:outline-hidden cursor-pointer rounded-md text-start text-sm font-medium select-none text-zinc-800 data-active:bg-zinc-100 [&[disabled]]:text-zinc-400 dark:text-white dark:data-active:bg-zinc-600 dark:[&[disabled]]:text-zinc-400';
@endphp

<div
    {{ $attributes->class($classes) }}
    role="option"
    @if ($value !== null) data-value="{{ $value }}" @endif
    data-flux-listbox-option
>
    <div class="w-6 shrink-0">
        @if ($indicator)
            {{ $indicator }}
        @else
            <tabler:select.indicator />
        @endif
    </div>

    {{ $slot->isNotEmpty() ? $slot : $label }}
</div>
