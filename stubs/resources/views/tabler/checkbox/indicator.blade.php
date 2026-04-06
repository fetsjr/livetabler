@props([
    'checked' => false,
])

<span {{ $attributes->class(['d-flex align-items-center justify-content-center rounded border', $checked ? 'bg-primary border-primary' : 'border-secondary']) }}
    style="width: 1rem; height: 1rem; transition: background-color 0.15s ease, border-color 0.15s ease;">
    @if ($checked)
        <svg class="text-white" width="10" height="10" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>
    @endif
</span>
