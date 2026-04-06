@php
$classes = 'd-flex align-items-center justify-content-center flex-shrink-0 rounded border border-secondary';
@endphp

<span {{ $attributes->class($classes) }} style="width: 1rem; height: 1rem;"
    data-tabler-indicator="checkbox">
    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        style="width: 0.625rem; height: 0.625rem; display: none;"
        data-checked-icon>
        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
    </svg>
</span>
