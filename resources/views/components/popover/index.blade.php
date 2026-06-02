@props([
    // Lado donde aparece el panel respecto al disparador.
    // Valores publicos (en ingles): 'top' | 'bottom' | 'left' | 'right'.
    'position' => 'bottom',
])

@php
    // Traducimos la posicion publica al sufijo de Tabler/Bootstrap (start/end en vez de left/right)
    // para construir la clase direccional bs-popover-* que dibuja el arrow en el lado correcto.
    $direccion = match ($position) {
        'top'   => 'top',
        'left'  => 'start',
        'right' => 'end',
        default => 'bottom',
    };

    // Clase direccional nativa de Bootstrap 5 que posiciona el arrow del popover.
    $claseDireccion = 'bs-popover-'.$direccion;

    // Como este popover es Alpine (sin Popper.js), posicionamos el panel a mano con utilidades
    // de Bootstrap. Cada lado fija el anclaje y un pequeno margen de separacion del disparador.
    $clasesPosicion = match ($position) {
        'top'   => 'bottom-100 start-50 translate-middle-x mb-2',
        'left'  => 'end-100 top-50 translate-middle-y me-2',
        'right' => 'start-100 top-50 translate-middle-y ms-2',
        default => 'top-100 start-50 translate-middle-x mt-2', // bottom
    };
@endphp

{{-- Contenedor relativo: ancla el panel absoluto y agrupa el estado Alpine.
     La tecla Escape cierra el popover; el click fuera lo cierra desde el propio panel. --}}
<div
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    {{ $attributes->class(['popover-container', 'position-relative', 'd-inline-block']) }}
>
    {{-- Disparador: solo se renderiza si el consumidor pasa el slot trigger.
         Togglea el estado y expone semantica accesible de popover. --}}
    @isset($trigger)
        <div
            @click="open = ! open"
            @keydown.enter.prevent="open = ! open"
            @keydown.space.prevent="open = ! open"
            role="button"
            tabindex="0"
            aria-haspopup="dialog"
            :aria-expanded="open.toString()"
        >
            {{ $trigger }}
        </div>
    @endisset

    {{-- Panel del popover: clases nativas de Tabler (popover, bs-popover-*, popover-arrow,
         popover-body). La clase .popover ya aporta su propio z-index (1070) via variable CSS,
         suficiente para quedar por encima de modales/dropdowns. NO anadir z-3: la utilidad
         .z-3 (z-index:3) se genera DESPUES de .popover en el CSS y, con igual especificidad,
         BAJARIA el z-index a 3 hundiendo el popover bajo cualquier overlay. --}}
    <div
        x-show="open"
        x-cloak
        @click.outside="open = false"
        @class([
            'popover',
            $claseDireccion,
            $clasesPosicion,
            'position-absolute',
            'shadow',
        ])
        role="dialog"
    >
        {{-- Sin Popper.js el arrow no queda perfectamente centrado respecto al disparador;
             es una limitacion cosmetica aceptada (ver comentario del panel mas arriba). --}}
        <div class="popover-arrow"></div>

        {{-- Cabecera opcional del popover (slot con nombre header). --}}
        @isset($header)
            <div class="popover-header">{{ $header }}</div>
        @endisset

        <div class="popover-body">
            {{ $slot }}
        </div>
    </div>
</div>
