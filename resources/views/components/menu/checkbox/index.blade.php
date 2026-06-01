@props([
    // Estado marcado inicial.
    'checked' => false,

    // Atributo name del input (para envio en formularios o filtros).
    'name' => null,

    // Atributo value del input.
    'value' => null,

    // Deshabilita el item.
    'disabled' => false,
])

{{-- Item de menu con checkbox, segun el patron de Tabler: un label con clase
     dropdown-item que envuelve un input form-check-input. El estado usa los
     atributos nativos de HTML (no Alpine) porque el patron de filtros de Tabler
     envia inputs reales en el formulario. Las clases del consumidor se fusionan
     en el label (elemento raiz). --}}
<label {{ $attributes->class(['dropdown-item', 'disabled' => $disabled]) }}>
    <input
        class="form-check-input m-0 me-2"
        type="checkbox"
        @if ($name) name="{{ $name }}" @endif
        @if ($value !== null) value="{{ $value }}" @endif
        @checked($checked)
        @disabled($disabled)
    >
    {{ $slot }}
</label>
