@props([
    // Id del select. Si no se indica se genera uno aleatorio para enlazar el script.
    'id' => null,

    // Atributo name del select; también enlaza el error de validación.
    'name' => '',

    // Valor inicial seleccionado. Si se indica se renderiza como opción seleccionada.
    'value' => null,

    // Texto de la etiqueta. Si es null no se muestra etiqueta.
    'label' => null,

    // Texto del placeholder del control.
    'placeholder' => 'Buscar...',

    // Endpoint de búsqueda remota. Si se indica, TomSelect carga resultados via fetch.
    'url' => null,

    // Número mínimo de caracteres antes de disparar la búsqueda remota.
    'minChars' => 3,

    // Opciones estáticas del select como array clave => etiqueta.
    'options' => [],
])

@php
    // Id efectivo: el indicado por el consumidor o uno aleatorio.
    $idEfectivo = $id ?? 'autocomplete-' . uniqid();

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

    {{-- El select fusiona los atributos extra del consumidor en un único atributo class.
         La clase is-invalid se añade automáticamente si hay error de validación. --}}
    <select
        name="{{ $name }}"
        id="{{ $idEfectivo }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->class(['form-select', 'is-invalid' => $tieneError]) }}
    >
        @if ($value)
            <option value="{{ $value }}" selected>{{ $value }}</option>
        @endif

        @foreach ($options as $key => $optionLabel)
            <option value="{{ $key }}">{{ $optionLabel }}</option>
        @endforeach
    </select>

    {{-- Mensaje de validación. Usamos $tieneError (que ya comprueba la existencia del bag)
         en lugar de @error, porque @error accede a $errors sin protección. --}}
    @if ($tieneError)
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif

    {{-- Auto-inicialización: solo si la librería TomSelect está cargada en la página.
         Si no lo está, el componente degrada a un <select> plano sin romper. --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const el = document.getElementById('{{ $idEfectivo }}');
            if (window.TomSelect) {
                new TomSelect(el, {
                    valueField: 'id',
                    labelField: 'text',
                    searchField: 'text',
                    @if ($url)
                    load: function (query, callback) {
                        if (query.length < {{ $minChars }}) return callback();

                        var url = '{{ $url }}?q=' + encodeURIComponent(query);
                        fetch(url)
                            .then(response => response.json())
                            .then(json => {
                                callback(json.items || json);
                            }).catch(() => {
                                callback();
                            });
                    },
                    @endif
                    render: {
                        option: function (item, escape) {
                            return '<div>' + escape(item.text) + '</div>';
                        },
                        item: function (item, escape) {
                            return '<div>' + escape(item.text) + '</div>';
                        }
                    }
                });
            }
        });
    </script>
</div>
