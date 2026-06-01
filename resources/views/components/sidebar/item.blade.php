@props([
    // Nombre del icono Tabler (sin prefijo "ti-"). Se renderiza con el componente icon. Ej: icon="home".
    'icon' => null,
    // URL de destino del enlace. Si es null, el enlace se renderiza sin href (placeholder).
    'href' => null,
    // Marca el item como activo (resalta el li raíz con la clase 'active' de Tabler).
    'current' => false,
    // Texto/contenido del badge a la derecha. Si es null, no se muestra badge.
    'badge' => null,
    // Color Tabler del badge (red, blue, green...). Genera bg-{color} text-{color}-fg.
    'badgeColor' => 'red',
    // Deshabilita el enlace (clase 'disabled' de Tabler).
    'disabled' => false,
])

{{-- En Tabler el item del menú vertical es un li.nav-item; la clase 'active'
     va en el li, NO en el enlace interno. Fusionamos las clases del consumidor en el li raíz. --}}
<li {{ $attributes->class(['nav-item', 'active' => $current]) }}>
    {{-- El enlace nav-link es interno: aquí se permite la directiva class (no es la raíz). --}}
    <a @class(['nav-link', 'disabled' => $disabled])
       @if ($href) href="{{ $href }}" @endif
       @if ($current) aria-current="page" @endif>
        {{-- Icono opcional, con las clases responsivas estándar de Tabler --}}
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <x-tabler::icon :name="$icon" />
            </span>
        @endif
        {{-- Título del enlace --}}
        <span class="nav-link-title">{{ $slot }}</span>
        {{-- Badge opcional, alineado a la derecha con ms-auto (clase real Tabler) --}}
        @if ($badge !== null)
            <span class="badge badge-sm bg-{{ $badgeColor }} text-{{ $badgeColor }}-fg ms-auto">{{ $badge }}</span>
        @endif
    </a>
</li>
