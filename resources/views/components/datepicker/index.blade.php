@props([
    // Id del input. Si no se indica se genera uno aleatorio para enlazar el script.
    'id' => null,

    // Atributo name del input; también enlaza el error de validación.
    'name' => '',

    // Valor inicial del campo (cadena de fecha).
    'value' => null,

    // Texto de la etiqueta. Si es null no se muestra etiqueta.
    'label' => null,

    // Texto del placeholder del input.
    'placeholder' => 'Seleccionar fecha...',

    // Formato de fecha que usa Litepicker para mostrar/parsear.
    'format' => 'YYYY-MM-DD',

    // Si es true muestra un icono de calendario dentro del input.
    'icon' => false,

    // Opciones extra de Litepicker que se fusionan con la configuración por defecto.
    'options' => [],
])

@php
    // Id efectivo: el indicado por el consumidor o uno aleatorio.
    $idEfectivo = $id ?? 'dp-' . uniqid();

    // ¿Hay un error de validación para este campo? Solo lo comprobamos si name no está
    // vacío y el bag $errors está disponible (en algunos contextos de render no se comparte),
    // evitando el error "Undefined variable $errors" en render aislado.
    $tieneError = $name && isset($errors) && $errors->has($name);
@endphp

<div class="mb-3">
    {{-- Etiqueta opcional --}}
    @if ($label)
        <label class="form-label" for="{{ $idEfectivo }}">{{ $label }}</label>
    @endif

    {{-- Si hay icono, envolvemos el input para colocar el calendario dentro --}}
    <div @class(['input-icon' => $icon])>
        @if ($icon)
            <span class="input-icon-addon">
                <x-tabler::icon name="calendar" />
            </span>
        @endif

        {{-- El input fusiona los atributos extra del consumidor en un único atributo class.
             La clase is-invalid se añade automáticamente si hay error de validación. --}}
        <input
            type="text"
            name="{{ $name }}"
            id="{{ $idEfectivo }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->class(['form-control', 'is-invalid' => $tieneError]) }}
        >
    </div>

    {{-- Mensaje de validación. Usamos $tieneError (que ya comprueba la existencia del bag)
         en lugar de @error, porque @error accede a $errors sin protección. --}}
    @if ($tieneError)
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif

    {{-- Auto-inicialización: solo si la librería Litepicker está cargada en la página.
         Si no lo está, el componente degrada a un input de texto plano sin romper. --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (window.Litepicker) {
                new Litepicker({
                    element: document.getElementById('{{ $idEfectivo }}'),
                    format: @js($format),
                    ...{!! json_encode((object) $options) !!}
                });
            }
        });
    </script>
</div>
