@props([
    // Color de la alerta (alert-{variant}): info, success, warning, danger
    // o cualquier color base de Tabler (lime, cyan, facebook...).
    'variant' => 'info',

    // Título opcional de la alerta. Si se indica, se muestra en un <h4 class="alert-title">.
    'title' => null,

    // Nombre del icono Tabler (sin el prefijo "ti-") que se muestra a la izquierda.
    'icon' => null,

    // Si es true, añade el botón de cierre y la clase alert-dismissible.
    'dismissible' => false,

    // Si es true, usa el color como fondo de la alerta (alert-important).
    'important' => false,
])

{{-- Alerta de Tabler. La etiqueta raíz fusiona las clases del consumidor en un
     único atributo class y añade por defecto role="alert". --}}
<div {{ $attributes->class([
        'alert',                                 // clase base de Tabler
        'alert-'.$variant,                       // color de la alerta
        'alert-dismissible' => $dismissible,     // deja hueco para el botón de cierre
        'alert-important' => $important,          // color de fondo intenso
    ])->merge(['role' => 'alert']) }}>
    <div class="d-flex">
        {{-- Icono opcional a la izquierda del mensaje --}}
        @if ($icon)
            <div>
                <x-tabler::icon :name="$icon" class="alert-icon" />
            </div>
        @endif
        <div>
            {{-- Título opcional --}}
            @if ($title)
                <h4 class="alert-title">{{ $title }}</h4>
            @endif

            {{-- Mensaje de la alerta --}}
            {{ $slot }}
        </div>
    </div>

    {{-- Botón de cierre (solo si la alerta es descartable) --}}
    @if ($dismissible)
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    @endif
</div>
