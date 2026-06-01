@props([
    // Estado seleccionado inicial.
    'checked' => false,

    // Atributo name del radio (DEBE ser igual en todos los radios del grupo).
    'name' => null,

    // Atributo value del radio.
    'value' => null,

    // Deshabilita el item.
    'disabled' => false,
])

{{-- Item de menu con radio, segun el patron de Tabler: un label con clase
     dropdown-item que envuelve un input radio form-check-input nativo. El estado
     usa los atributos nativos de HTML para que un grupo de radios sea mutuamente
     excluyente al compartir name. Las clases del consumidor se fusionan en el
     label (elemento raiz). --}}
<label {{ $attributes->class(['dropdown-item', 'disabled' => $disabled]) }}>
    <input
        class="form-check-input m-0 me-2"
        type="radio"
        @if ($name) name="{{ $name }}" @endif
        @if ($value !== null) value="{{ $value }}" @endif
        @checked($checked)
        @disabled($disabled)
    >
    {{ $slot }}
</label>
