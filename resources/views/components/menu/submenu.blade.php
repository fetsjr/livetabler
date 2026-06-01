@props([
    // Texto del disparador del submenu (la fila padre sobre la que se abre el anidado).
    'heading' => null,

    // Icono opcional del disparador (nombre Tabler sin "ti-").
    'icon' => null,
])

{{-- Submenu anidado. Tabler/Bootstrap 5 no tiene clase nativa de submenu, asi que
     usamos Alpine: al pasar el raton (o pulsar) se muestra un dropdown-menu hijo
     posicionado a la derecha de la fila padre. Las clases del consumidor se fusionan
     una sola vez en el contenedor raiz. --}}
<div
    x-data="{ abierto: false }"
    @mouseenter="abierto = true"
    @mouseleave="abierto = false"
    {{ $attributes->class(['dropdown-submenu position-relative']) }}
>
    {{-- Fila disparadora: es un dropdown-item normal con un chevron a la derecha. --}}
    <button
        type="button"
        class="dropdown-item d-flex align-items-center"
        @click="abierto = !abierto"
        :aria-expanded="abierto ? 'true' : 'false'"
    >
        @if ($icon)
            <x-tabler::icon :name="$icon" class="dropdown-item-icon" />
        @endif
        <span>{{ $heading ?? $slot }}</span>
        <x-tabler::icon name="chevron-right" class="ms-auto" />
    </button>

    {{-- Menu hijo: reutiliza dropdown-menu, posicionado a la derecha del padre.
         El display:none inicial lo gobierna Alpine con x-show para evitar parpadeo. --}}
    <div
        x-show="abierto"
        x-transition
        class="dropdown-menu position-absolute top-0 start-100"
        style="display: none;"
    >
        {{ $slot }}
    </div>
</div>
