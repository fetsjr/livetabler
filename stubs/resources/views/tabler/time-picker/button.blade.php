@props([
    'type' => 'button',
])

<button type="{{ $type }}" {{ $attributes->class(['btn btn-outline-secondary d-inline-flex align-items-center gap-2']) }}>
    <svg class="icon text-muted" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    {{ $slot }}
</button>
