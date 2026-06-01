@props([
    // Atributo name del radio (compartido por el grupo).
    'name' => '',
    // Valor de esta opción.
    'value' => '1',
    // Si arranca seleccionado.
    'checked' => false,
    // Texto de la etiqueta.
    'label' => null,
    // Texto descriptivo.
    'description' => null,
])

@php
    // id único combinando el name del grupo y el valor de la opción.
    $id = ($name ?: 'radio').'_'.$value;
@endphp

<label {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-check']) }}>
    <input
        type="radio"
        class="form-check-input"
        value="{{ $value }}"
        @if ($name) name="{{ $name }}" id="{{ $id }}" {{ $attributes->wire('model') }} @endif
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
