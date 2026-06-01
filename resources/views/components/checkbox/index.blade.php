@props([
    // Atributo name del checkbox.
    'name' => '',
    // Valor enviado cuando está marcado.
    'value' => '1',
    // Si arranca marcado.
    'checked' => false,
    // Si true, lo muestra como interruptor (switch) en vez de casilla.
    'switch' => false,
    // Texto de la etiqueta junto a la casilla.
    'label' => null,
    // Texto descriptivo bajo la etiqueta.
    'description' => null,
])

<label {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-check', 'form-switch' => $switch]) }}>
    <input
        type="checkbox"
        class="form-check-input"
        value="{{ $value }}"
        @if ($name) name="{{ $name }}" id="{{ $name }}" {{ $attributes->wire('model') }} @endif
        @checked($checked)
    >
    {{-- Etiqueta (acepta texto por prop o por slot) --}}
    @if ($label || $slot->isNotEmpty())
        <span class="form-check-label">{{ $label ?? $slot }}</span>
    @endif
    {{-- Descripción opcional --}}
    @if ($description)
        <span class="form-check-description">{{ $description }}</span>
    @endif
</label>
