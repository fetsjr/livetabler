@props([
    // Posición de la cinta: 'top', 'bottom', 'start', 'end', 'top-start'...
    'position' => 'top',
    // Color de fondo de Tabler (bg-{color}).
    'color' => 'primary',
    // Estilo "marcador" (ribbon-bookmark).
    'bookmark' => false,
])

{{-- Cinta decorativa de Tabler. Fusiona las clases del consumidor. --}}
<div {{ $attributes->class([
    'ribbon',
    'ribbon-bookmark' => $bookmark,
    'ribbon-'.$position,
    'bg-'.$color,
]) }}>
    {{ $slot }}
</div>
