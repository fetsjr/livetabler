@props([
    'checked' => false,
])

<span {{ $attributes->class(['d-flex align-items-center justify-content-center rounded-circle border', $checked ? 'border-primary' : 'border-secondary']) }}
    style="width: 1rem; height: 1rem; transition: border-color 0.15s ease;">
    @if ($checked)
        <span class="rounded-circle bg-primary" style="width: 0.5rem; height: 0.5rem;"></span>
    @endif
</span>
