@props([
    // Color Tabler del icono (primary, red, green, blue...). Pinta el fondo
    // del circulo del icono via bg-{color}.
    'color' => 'primary',

    // Nombre del icono Tabler (sin prefijo 'ti-') que se muestra dentro del
    // circulo de la linea de tiempo.
    'icon' => 'check',

    // Marca de tiempo opcional (texto libre, p. ej. '10:30' o 'hace 2h').
    // Si es null no se renderiza el bloque de hora.
    'time' => null,

    // Titulo del evento.
    'title' => '',
])

<li>
    {{-- Circulo con el icono, coloreado segun la prop color. --}}
    <div class="list-timeline-icon bg-{{ $color }} text-white">
        <x-tabler::icon :name="$icon" :size="14" />
    </div>
    <div class="list-timeline-content">
        {{-- La hora solo se pinta si se proporciona (no hay default now()). --}}
        @if ($time)
            <div class="list-timeline-time">{{ $time }}</div>
        @endif
        <p class="list-timeline-title">{{ $title }}</p>
        {{-- Descripcion opcional en el slot. --}}
        @if ($slot->isNotEmpty())
            <p class="text-secondary">{{ $slot }}</p>
        @endif
    </div>
</li>
