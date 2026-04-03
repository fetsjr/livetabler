@php
    $name = $name ?? '';
    $label = $label ?? null;
    $description = $description ?? null;
    $checked = $checked ?? false;
    $invalid = $invalid ?? false;
@endphp

<label {{ $attributes->merge(['class' => 'form-check form-switch']) }}>
    <input
        type="checkbox"
        class="form-check-input"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $name }}" @endif
        @if ($checked) checked @endif
        @if ($invalid) is-invalid @endif
    />
    @if ($label || $slot->isNotEmpty() || $description)
        <span class="form-check-label">
            {{ $label ?? $slot }}
            @if ($description)
                <span class="form-check-description">
                    {{ $description }}
                </span>
            @endif
        </span>
    @endif
</label>
