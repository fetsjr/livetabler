@props([
    // Nombre de la pestaña activa al cargar (debe coincidir con el "name" de una pestaña y su panel).
    'default' => null,
])

{{-- Contenedor raíz de las pestañas: declara el estado Alpine compartido por toda la familia.
     activeTab es la ÚNICA fuente de verdad; los botones la mutan y los paneles reaccionan. --}}
<div
    x-data="{ activeTab: @js($default) }"
    {{ $attributes->class(['w-100']) }}
>
    {{ $slot }}
</div>
