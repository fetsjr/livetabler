@php
$classes = 'h-4 w-4 shrink-0 rounded-[.3rem] border border-zinc-300 dark:border-zinc-500 [ui-option[data-selected]_&]:bg-zinc-800 [ui-option[data-selected]_&]:border-zinc-800 dark:[ui-option[data-selected]_&]:bg-white dark:[ui-option[data-selected]_&]:border-white flex items-center justify-center';
@endphp

<span {{ $attributes->class($classes) }}>
    <svg class="h-3 w-3 hidden [ui-option[data-selected]_&]:block text-white dark:text-zinc-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
    </svg>
</span>
