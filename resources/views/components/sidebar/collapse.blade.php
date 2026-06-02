@props([
    // Texto del encabezado del submenú (el enlace que despliega).
    'heading' => null,
    // Icono Tabler opcional (sin prefijo "ti-").
    'icon' => null,
    // Id del menú, solo para enlace ARIA (aria-controls). Si es null se deriva del heading.
    'id' => null,
    // Si es true, el submenú arranca desplegado (clase 'show' + aria-expanded="true").
    'open' => false,
    // Si es true, el submenú no se autocierra (data-bs-auto-close="false").
    // Si es false (por defecto), usa el comportamiento canónico de Tabler: 'outside'.
    'keepOpen' => false,
])

@php
    // Id estable para enlazar el menú via aria-controls. Si no se pasa, lo derivamos del
    // heading (determinista). El dropdown de Tabler se acopla por DOM (padre .dropdown /
    // hermano .dropdown-menu), NO por ancla, así que este id NO se usa en el href.
    $dropdownId = $id ?? 'sidebar-submenu-'.\Illuminate\Support\Str::slug($heading ?? 'menu');

    // Tabler usa 'outside' por defecto (autocierra al clicar fuera) y 'false' solo con keep-open.
    $autoClose = $keepOpen ? 'false' : 'outside';
@endphp

{{-- Submenú colapsable al estilo Tabler: li.nav-item.dropdown.
     Usa Bootstrap dropdown (data-bs-toggle="dropdown"), lo más fiel a Tabler
     navbar-vertical. El acople disparador/menú es por DOM, por eso el href es un mero
     placeholder ("#") y el id del menú solo sirve para aria-controls. Fusiona las clases
     del consumidor en el li raíz. --}}
<li {{ $attributes->class(['nav-item', 'dropdown']) }}>
    {{-- Enlace que despliega el submenú (interno: se permite la directiva class) --}}
    <a @class(['nav-link', 'dropdown-toggle', 'show' => $open])
       href="#"
       data-bs-toggle="dropdown"
       data-bs-auto-close="{{ $autoClose }}"
       role="button"
       aria-haspopup="true"
       aria-controls="{{ $dropdownId }}"
       aria-expanded="{{ $open ? 'true' : 'false' }}">
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <x-tabler::icon :name="$icon" />
            </span>
        @endif
        <span class="nav-link-title">{{ $heading }}</span>
    </a>
    {{-- Contenedor del submenú; 'show' lo mantiene abierto si open=true. El id solo enlaza
         aria-controls; el acople funcional es por DOM (hermano de .dropdown). --}}
    <div @class(['dropdown-menu', 'show' => $open]) id="{{ $dropdownId }}">
        {{ $slot }}
    </div>
</li>
