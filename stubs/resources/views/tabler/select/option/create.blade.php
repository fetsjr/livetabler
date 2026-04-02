@props([
    'modal' => null,
])

@php
$classes = 'group/option overflow-hidden data-hidden:hidden group flex items-center px-2 py-1.5 w-full focus:outline-hidden rounded-md text-start text-sm font-medium select-none text-zinc-800 data-active:bg-zinc-100 dark:text-white dark:data-active:bg-zinc-600';

if ($modal) {
    $attributes = $attributes->merge(['x-on:click' => "\$dispatch('modal-show', { name: '{$modal}' })"]);
}
@endphp

<div {{ $attributes->class($classes) }} role="option" data-flux-option-create>
    <div class="w-6 shrink-0">
        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
    </div>

    <span>{{ $slot }}</span>
</div>
