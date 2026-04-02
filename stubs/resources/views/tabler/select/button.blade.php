@props([
    'placeholder' => null,
    'clearable' => null,
    'invalid' => null,
    'suffix' => null,
    'size' => null,
    'max' => null,
])

@php
$sizeClasses = match($size ?? null) {
        'sm' => 'h-8 text-sm rounded-md ps-3 pe-8',
        'xs' => 'h-6 text-xs rounded ps-2 pe-6',
        default => 'h-10 text-base sm:text-sm rounded-lg ps-3 pe-10',
    };
    $classes = "group/select-button cursor-default overflow-hidden flex items-center shadow-xs bg-white dark:bg-white/10 {$sizeClasses} border border-zinc-200 dark:border-zinc-600 w-full text-start";

$name = $attributes->whereStartsWith('wire:model')->first();
$invalid ??= ($name && $errors->has($name));
@endphp

<button
    type="button"
    {{ $attributes->class($classes) }}
    @if ($invalid) data-invalid aria-invalid="true" @endif
    data-flux-select-button
>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        <tabler:select.selected :$placeholder :$suffix :$max />
    @endif

    @if ($clearable && $size !== 'xs')
        <span class="absolute right-8 hidden [[data-has-value]_&]:flex items-center cursor-pointer text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300" data-flux-select-clear>
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
        </span>
    @endif

    <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center {{ $size === 'xs' ? 'pr-1.5' : 'pr-3' }}">
        <svg class="{{ $size === 'xs' ? 'h-3 w-3' : 'h-4 w-4' }} text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </span>
</button>
