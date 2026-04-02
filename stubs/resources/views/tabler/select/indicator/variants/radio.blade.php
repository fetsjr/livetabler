@php
$classes = 'h-4 w-4 shrink-0 rounded-full border border-zinc-300 dark:border-zinc-500 [ui-option[data-selected]_&]:border-zinc-800 dark:[ui-option[data-selected]_&]:border-white flex items-center justify-center';
@endphp

<span {{ $attributes->class($classes) }}>
    <span class="h-2 w-2 rounded-full hidden [ui-option[data-selected]_&]:block bg-zinc-800 dark:bg-white"></span>
</span>
