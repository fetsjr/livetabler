@props([
    'badge' => null,
    'aside' => null,
    'trailing' => null,
    'srOnly' => false,
])

<label {{ $attributes->class(['form-label', $srOnly ? 'sr-only' : '']) }}>
    {{ $slot }}

    @if ($aside)
        <span class="form-label-description">
            {{ $aside }}
        </span>
    @endif

    @if ($badge)
        <span class="badge bg-blue-lt ms-2">{{ $badge }}</span>
    @endif

    @if ($trailing)
        <span class="float-end text-muted small">
            {{ $trailing }}
        </span>
    @endif
</label>
