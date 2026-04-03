@php
    $classes = 'form-check';
    if ($switch ?? false) {
        $classes .= ' form-switch';
    }
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}>
    <input type="checkbox" 
           name="{{ $name }}" 
           value="{{ $value }}"
           class="form-check-input"
           @if($checked ?? false) checked @endif
    >
    @if (($label ?? null) || $slot->isNotEmpty())
        <span class="form-check-label">
            {{ $label ?? $slot }}
        </span>
    @endif
    @if ($description ?? null)
        <span class="form-check-description">
            {{ $description }}
        </span>
    @endif
</label>
