@props([
    // Texto del encabezado del submenú (el enlace que despliega).
    'heading' => null,
    // Icono Tabler opcional (sin prefijo "ti-").
    'icon' => null,
    // Id único del dropdown, usado por href/ancla. Si es null se genera uno aleatorio.
    'id' => null,
    // Si es true, el submenú arranca desplegado (clase 'show' + aria-expanded="true").
    'open' => false,
])

@php
    // Id estable para el ancla del dropdown; si no se pasa, generamos uno único.
    $dropdownId = $id ?? 'sidebar-submenu-'.\Illuminate\Support\Str::random(6);
@endphp

{{-- Submenú colapsable al estilo Tabler: li.nav-item.dropdown.
     Usa Bootstrap dropdown (data-bs-toggle="dropdown"), lo más fiel a Tabler
     navbar-vertical. Fusiona las clases del consumidor en el li raíz. --}}
<li {{ $attributes->class(['nav-item', 'dropdown']) }}>
    {{-- Enlace que despliega el submenú (interno: se permite la directiva class) --}}
    <a @class(['nav-link', 'dropdown-toggle', 'show' => $open])
       href="#{{ $dropdownId }}"
       data-bs-toggle="dropdown"
       data-bs-auto-close="false"
       role="button"
       aria-haspopup="true"
       aria-expanded="{{ $open ? 'true' : 'false' }}">
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <x-tabler::icon :name="$icon" />
            </span>
        @endif
        <span class="nav-link-title">{{ $heading }}</span>
    </a>
    {{-- Contenedor del submenú; 'show' lo mantiene abierto si open=true --}}
    <div @class(['dropdown-menu', 'show' => $open]) id="{{ $dropdownId }}">
        {{ $slot }}
    </div>
</li>
