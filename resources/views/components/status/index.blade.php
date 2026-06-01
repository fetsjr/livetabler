@props([
    // Color del indicador (status-{color}): primary, success, danger, green, red...
    'color' => 'primary',

    // Si true, añade la animación de pulso.
    'animated' => false,
])

{{-- Punto de estado de Tabler. Fusiona las clases del consumidor. --}}
<span {{ $attributes->class(['status-dot', 'status-'.$color, 'status-dot-animated' => $animated]) }}></span>
