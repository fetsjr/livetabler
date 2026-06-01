@props([
    // Atributo name del interruptor.
    'name' => '',
    // Valor enviado cuando está activado.
    'value' => '1',
    // Si arranca activado.
    'checked' => false,
    // Texto de la etiqueta.
    'label' => null,
    // Texto descriptivo.
    'description' => null,
])

<label {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-check', 'form-switch']) }}>
    <input
        type="checkbox"
        class="form-check-input"
        value="{{ $value }}"
        @if ($name) name="{{ $name }}" id="{{ $name }}" {{ $attributes->wire('model') }} @endif
        @checked($checked)
    >
    @if ($label || $slot->isNotEmpty() || $description)
        <span class="form-check-label">
            {{ $label ?? $slot }}
            @if ($description)
                <span class="form-check-description">{{ $description }}</span>
            @endif
        </span>
    @endif
</label>
