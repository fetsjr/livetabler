@php
$classes = 'px-2 pb-2 d-flex flex-column gap-2';
@endphp

<div {{ $attributes->class($classes) }} data-tabler-kanban-column-cards>
    {{ $slot }}
</div>
