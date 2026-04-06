@props([
    //
])

@php
$classes = 'rounded-3 bg-body-tertiary';
@endphp

<div data-tabler-kanban-column style="width: 20rem; max-width: 20rem;">
    <div {{ $attributes->class($classes) }}>
        {{ $slot }}
    </div>
</div>
