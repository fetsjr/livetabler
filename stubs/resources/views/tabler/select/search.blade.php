@props([
    'placeholder' => null,
    'clearable' => true,
    'closable' => null,
    'icon' => null,
])

@php
$classes = 'h-10 w-full flex items-center px-3 py-2 font-medium text-base sm:text-sm text-zinc-800 dark:text-white ps-9 pe-9 outline-hidden border-b border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700';
@endphp

<div class="relative flex grow" data-flux-select-search>
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        @if ($icon)
            <tabler:icon :name="$icon" class="h-4 w-4 text-zinc-400" />
        @else
            <svg class="h-4 w-4 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
            </svg>
        @endif
    </div>

    <input
        type="text"
        {{ $attributes->class($classes) }}
        placeholder="{{ $placeholder ?? __('Search...') }}"
        data-flux-select-search-input
        autofocus
    >

    @if ($clearable)
        <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300" data-flux-select-search-clear>
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
        </button>
    @endif
</div>
