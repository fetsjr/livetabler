@props([
    // Color del badge. Mapea a clases reales de Tabler (variante clara "-lt").
    // Valores soportados: 'blue', 'red', 'green', 'yellow', 'secondary' (por defecto).
    'color' => 'secondary',
])

@php
    // Traduccion del color publico a clases Tabler verificadas (badge claro).
    // Fuente: codigo/tabler-dev/docs/content/ui/components/badge.md (bg-<color>-lt).
    $claseColor = match ($color) {
        'blue'   => 'bg-blue-lt',
        'red'    => 'bg-red-lt',
        'green'  => 'bg-green-lt',
        'yellow' => 'bg-yellow-lt',
        default  => 'bg-secondary-lt',
    };
@endphp

{{-- Badge pequeno empujado a la derecha (ms-auto) dentro del nav-link.
     Raiz span que fusiona las clases del consumidor en un UNICO atributo class. --}}
<span {{ $attributes->class(['badge', 'badge-sm', $claseColor, 'ms-auto']) }}>
    {{ $slot }}
</span>
