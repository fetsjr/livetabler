@php
$classes = 'd-flex align-items-center justify-content-center flex-shrink-0 rounded-circle border border-secondary';
@endphp

<span {{ $attributes->class($classes) }} style="width: 1rem; height: 1rem;"
    data-tabler-indicator="radio">
    <span class="rounded-circle bg-body"
        style="width: 0.5rem; height: 0.5rem; display: none;"
        data-checked-dot>
    </span>
</span>
