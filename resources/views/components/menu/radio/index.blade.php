@props([
    'checked' => false,
    'name' => null,
    'value' => null,
])

<button
    type="button"
    {{ $attributes->class(['dropdown-item d-flex align-items-center gap-2']) }}
>
    <span
        class="d-flex align-items-center justify-content-center rounded-circle border {{ $checked ? 'border-primary' : 'border-secondary' }}"
        style="width: 1rem; height: 1rem;"
    >
        @if ($checked)
            <span class="rounded-circle bg-primary" style="width: 0.5rem; height: 0.5rem;"></span>
        @endif
    </span>
    <span>{{ $slot }}</span>
</button>
