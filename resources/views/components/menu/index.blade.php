@props([
    // Alinea el menu al borde final (derecha en LTR): anade dropdown-menu-end.
    'end' => false,

    // Muestra la flecha/puntero que apunta al disparador: anade dropdown-menu-arrow.
    'arrow' => false,

    // Tema oscuro del menu (data-bs-theme="dark").
    'dark' => false,

    // Si es true, fuerza el menu visible (util para previsualizacion/estado abierto
    // controlado por el consumidor). Anade la clase 'show'.
    'show' => false,
])

{{-- Contenedor raiz del menu desplegable de Tabler. El consumidor normalmente lo
     coloca dentro de un contenedor con clase dropdown junto a un disparador con
     data-bs-toggle (Bootstrap) o lo controla con Alpine. Fusiona las clases del
     consumidor una sola vez a traves del attribute bag. --}}
<div
    {{ $attributes->class([
        'dropdown-menu',                 // clase base de Tabler
        'dropdown-menu-end' => $end,     // alineacion al final
        'dropdown-menu-arrow' => $arrow, // puntero/flecha
        'show' => $show,                 // forzar visible
    ])->merge($dark ? ['data-bs-theme' => 'dark'] : []) }}
>
    {{ $slot }}
</div>
