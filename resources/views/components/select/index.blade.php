@props([
    // Atributo name del select; también se usa para la validación. En modo multiple se envía como name[].
    'name' => '',
    // Texto de la etiqueta <label>. Null = sin etiqueta.
    'label' => null,
    // Valor(es) seleccionado(s). String para selección simple, array para multiple.
    'value' => null,
    // Opciones como array asociativo [valor => texto].
    'options' => [],
    // Texto del placeholder (primera opción vacía en selección simple).
    'placeholder' => '',
    // Permite selección múltiple.
    'multiple' => false,
    // Activa el buscador enriquecido (TomSelect).
    'searchable' => false,
    // id del <select>. Si no se indica, se genera uno.
    'id' => null,
])

@php
    // id del control: el indicado o uno generado de forma estable a partir del name.
    $selectId = $id ?? 'select-'.($name !== '' ? $name : uniqid());

    // El control es inválido si hay un error de validación para este campo.
    $tieneError = $name && isset($errors) && $errors->has($name);

    // Determina si una opción está seleccionada (soporta simple y múltiple).
    $estaSeleccionada = function ($valorOpcion) use ($value, $multiple) {
        if ($multiple) {
            return in_array($valorOpcion, (array) ($value ?? []));
        }
        return (string) $valorOpcion === (string) $value;
    };
@endphp

<div class="mb-3">
    {{-- Etiqueta opcional --}}
    @if ($label)
        <label class="form-label" for="{{ $selectId }}">{{ $label }}</label>
    @endif

    {{-- El select fusiona los atributos del consumidor (wire:model, required...). --}}
    <select
        name="{{ $name.($multiple ? '[]' : '') }}"
        id="{{ $selectId }}"
        @if ($multiple) multiple @endif
        {{ $attributes->class(['form-select', 'is-invalid' => $tieneError]) }}
    >
        {{-- Placeholder como primera opción (solo en selección simple) --}}
        @if ($placeholder && ! $multiple)
            <option value="">{{ $placeholder }}</option>
        @endif

        {{-- Opciones desde el array --}}
        @foreach ($options as $valor => $texto)
            <option value="{{ $valor }}" @selected($estaSeleccionada($valor))>{{ $texto }}</option>
        @endforeach

        {{-- Opciones extra pasadas como slot --}}
        {{ $slot }}
    </select>

    {{-- Mensaje de validación --}}
    @if ($tieneError)
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>

{{-- Buscador/selección múltiple enriquecida con TomSelect (se auto-inicializa si está disponible). --}}
@if ($searchable || $multiple)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var el = document.getElementById('{{ $selectId }}');
            if (el && window.TomSelect) {
                new TomSelect(el, { copyClassesToDropdown: false });
            }
        });
    </script>
@endif
