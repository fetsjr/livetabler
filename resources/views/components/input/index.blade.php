@php
    $name = $name ?? '';
@endphp

<div class="mb-3">
    @if ($label ?? null)
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    @endif

    <div class="{{ ($icon ?? null) ? 'input-icon' : '' }}">
        @if ($icon ?? null)
            <span class="input-icon-addon">
                <x-tabler::icon :name="$icon" />
            </span>
        @endif

        <input type="{{ $type ?? 'text' }}" 
               name="{{ $name }}" 
               id="{{ $name }}" 
               class="form-control @error($name) is-invalid @enderror" 
               placeholder="{{ $placeholder ?? '' }}"
               {{ $attributes->whereDoesntStartWith(['name', 'type', 'id', 'placeholder', 'class']) }}>

        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if ($description ?? null)
        <small class="form-hint">{{ $description }}</small>
    @endif
</div>
