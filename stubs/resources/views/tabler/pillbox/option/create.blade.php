@props([
    'modal' => null,
])

@php
if ($modal) {
    $attributes = $attributes->merge(['x-on:click' => "\$dispatch('modal-show', { name: '{$modal}' })"]);
}
@endphp

<div
    {{ $attributes->class(['dropdown-item d-flex align-items-center gap-2 cursor-pointer w-100 text-start small fw-medium overflow-hidden']) }}
    role="option"
    data-tabler-option-create
>
    <div class="flex-shrink-0" style="width: 1.5rem;">
        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
    </div>

    <span>{{ $slot }}</span>
</div>
