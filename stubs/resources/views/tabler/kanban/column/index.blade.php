@props([
    //
])

@php
$classes = 'rounded-lg w-80 max-w-80 bg-zinc-100 dark:bg-zinc-800';
@endphp

<div data-flux-kanban-column>
    <div {{ $attributes->class($classes) }}>
        {{ $slot }}
    </div>
</div>
