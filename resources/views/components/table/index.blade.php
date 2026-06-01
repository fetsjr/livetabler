@props([
    // Filas alternas con fondo (zebra). Genera table-striped.
    'striped' => false,

    // Resaltar la fila bajo el cursor. Genera table-hover. Activo por defecto.
    'hover' => true,

    // Tabla dentro de una card (sin bordes laterales). Genera card-table.
    'card' => false,

    // Envolver la tabla en un contenedor con scroll horizontal (table-responsive).
    // Activo por defecto; si es false NO se renderiza ningún wrapper.
    'responsive' => true,
])

{{-- Wrapper de scroll horizontal: solo cuando responsive está activo. --}}
@if ($responsive)
    <div class="table-responsive">
@endif

    {{-- La <table> es la etiqueta que fusiona las clases del consumidor (class="...")
         con las clases calculadas, produciendo un único atributo class. --}}
    <table {{ $attributes->class([
            'table',                            // clase base de Tabler
            'table-vcenter',                    // alineación vertical centrada
            'table-striped' => $striped,        // filas en zebra
            'table-hover' => $hover,            // resaltado al pasar el ratón
            'card-table' => $card,              // tabla embebida en una card
        ]) }}>
        {{ $slot }}
    </table>

    {{-- Pie opcional (p. ej. paginación), con el estilo de card-footer de Tabler. --}}
    @if (isset($pagination))
        <div class="card-footer d-flex align-items-center">
            {{ $pagination }}
        </div>
    @endif

@if ($responsive)
    </div>
@endif
