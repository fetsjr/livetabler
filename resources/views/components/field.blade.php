@props([
    // Estilo del contenedor del campo:
    //  'block'  -> apilado vertical con margen inferior (por defecto).
    //  'inline' -> etiqueta y control en la misma fila (grid de Bootstrap).
    //  'bare'   -> sin clases, para maquetar a mano.
    'variant' => 'block',
])

@php
    // Traducimos la variante a las clases de Tabler/Bootstrap correspondientes.
    $clases = match ($variant) {
        'bare'   => '',
        'inline' => 'mb-3 row',
        default  => 'mb-3',
    };
@endphp

{{-- Envoltorio de un campo de formulario; fusiona las clases del consumidor. --}}
<div {{ $attributes->class([$clases]) }}>
    {{ $slot }}
</div>
