@props([
    // Nivel del encabezado (1 a 6): determina la etiqueta <h1>..<h6> y el tamaño.
    'level' => 1,
])

@php
    // Normalizamos el nivel a entero y lo acotamos al rango válido 1..6.
    $level = (int) $level;
    // Etiqueta HTML a usar según el nivel (h1..h6), siempre dentro del rango.
    $tag = 'h' . min(max($level, 1), 6);
    // Clases de tamaño/espaciado de Tabler para cada nivel.
    $classes = match($level) {
        1 => 'h1 mb-3',
        2 => 'h2 mb-2',
        3 => 'h3 mb-2',
        4 => 'h4 mb-1',
        default => 'h5',
    };
@endphp

{{-- Encabezado de Tabler. Fusiona las clases del consumidor. --}}
<{{ $tag }} {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</{{ $tag }}>
