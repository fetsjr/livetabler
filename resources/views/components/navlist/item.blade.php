@props([
    // URL de destino del enlace. Si es null se renderiza como boton type="button".
    'href' => null,

    // Nombre del icono Tabler (sin prefijo "ti-"), p.ej. icon="home".
    // Se muestra a la izquierda dentro de un span.nav-link-icon.
    'icon' => null,

    // Marca el item como activo: anade la clase "active" al li y al enlace/boton,
    // y el atributo aria-current="page" para accesibilidad.
    'active' => false,

    // Texto del badge a la derecha. Acepta string simple; usa el sub-componente
    // navlist.badge con color por defecto. Para color personalizado, anida un
    // navlist.badge con color en el slot en vez de esta prop.
    'badge' => null,
])

@php
    // Sin href => boton (util para acciones que abren menus/modales sin navegar).
    $tag = $href ? 'a' : 'button';
@endphp

{{-- Item de navegacion: li.nav-item es el raiz que fusiona las clases del consumidor.
     La clase "active" de Tabler vive en el li. Dentro va el enlace/boton con nav-link. --}}
<li {{ $attributes->class(['nav-item', 'active' => $active]) }}>
    <{{ $tag }}
        @class(['nav-link', 'active' => $active])
        @if ($href) href="{{ $href }}" @else type="button" @endif
        @if ($active) aria-current="page" @endif
    >
        {{-- Icono opcional. d-md-none d-lg-inline-block replica el comportamiento
             responsive de Tabler en el sidebar (oculto en md, visible en lg+). --}}
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <x-tabler::icon :name="$icon" />
            </span>
        @endif

        <span class="nav-link-title">
            {{ $slot }}
        </span>

        {{-- Badge: via prop simple (color por defecto) usando el sub-componente. --}}
        @if ($badge !== null)
            <x-tabler::navlist.badge>{{ $badge }}</x-tabler::navlist.badge>
        @endif
    </{{ $tag }}>
</li>
