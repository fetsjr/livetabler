@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'label' => null,
    'description' => null,
])

<label {{ $attributes->merge(['class' => 'form-check']) }}>
    <input
        type="checkbox"
        class="form-check-input"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $name }}" @endif
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
