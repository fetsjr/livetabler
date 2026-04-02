@php
$classes = 'data-hidden:hidden block items-center px-2 py-1.5 w-full rounded-md text-start text-sm font-medium text-zinc-500 dark:text-zinc-300';
@endphp

<div {{ $attributes->class($classes) }} data-flux-listbox-empty>
    {{ $slot }}
</div>
