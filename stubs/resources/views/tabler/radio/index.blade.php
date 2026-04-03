@php
    $name = $name ?? '';
    $value = $value ?? '1';
    $label = $label ?? null;
    $description = $description ?? null;
    $id = ($name ?: 'radio') . '_' . $value;
@endphp

<label {{ $attributes->merge(['class' => 'form-check']) }}>
    <input
        type="radio"
        value="{{ $value }}"
        class="form-check-input"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $id }}" @endif
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
