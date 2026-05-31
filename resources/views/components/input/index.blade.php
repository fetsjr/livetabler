@props([
    // Atributo name del input; también se usa como id y para enlazar el error de validación.
    'name' => '',

    // Tipo de input HTML: text, email, password, number...
    'type' => 'text',

    // Texto de la etiqueta <label>. Si es null no se muestra etiqueta.
    'label' => null,

    // Texto del placeholder.
    'placeholder' => null,

    // Nombre de un icono Tabler que se muestra dentro del input (a la izquierda).
    'icon' => null,

    // Texto de ayuda que se muestra debajo del input.
    'description' => null,
])

@php
    // ¿Hay un error de validación para este input? Solo lo comprobamos si name no está vacío
    // y si el bag de errores está disponible (en algunos contextos de render no se comparte),
    // así evitamos accesos al bag de errores con una clave inexistente o nula.
    $tieneError = $name && isset($errors) && $errors->has($name);
@endphp

<div class="mb-3">
    {{-- Etiqueta opcional --}}
    @if ($label)
        <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    @endif

    {{-- Si hay icono, envolvemos el input para colocarlo dentro --}}
    <div @class(['input-icon' => $icon])>
        @if ($icon)
            <span class="input-icon-addon">
                <x-tabler::icon :name="$icon" />
            </span>
        @endif

        {{-- El input fusiona los atributos extra del consumidor (wire:model, required, value...).
             La clase is-invalid se añade automáticamente si hay un error de validación. --}}
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->class(['form-control', 'is-invalid' => $tieneError]) }}
        >

        {{-- Mensaje de validación. Usamos $tieneError (que ya comprueba la existencia del bag)
             en lugar de @error directamente, porque @error accede a $errors sin protección y
             en algunos contextos de render ese bag no se comparte. --}}
        @if ($tieneError)
            <div class="invalid-feedback">{{ $errors->first($name) }}</div>
        @endif
    </div>

    {{-- Texto de ayuda --}}
    @if ($description)
        <small class="form-hint">{{ $description }}</small>
    @endif
</div>
