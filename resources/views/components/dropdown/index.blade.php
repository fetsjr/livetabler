@props([
    // Variante de color del botón disparador (secondary, primary, danger...).
    // Antes se usaba $variant sin default y lanzaba "Undefined variable $variant".
    'variant' => 'secondary',

    // Texto del botón disparador.
    'label' => 'Acciones',

    // Nombre del icono Tabler a mostrar antes del texto (sin el prefijo "ti-"). null = sin icono.
    'icon' => null,

    // Si es true, el disparador muestra la flecha de despliegue (clase dropdown-toggle).
    'arrow' => true,

    // Alineación del menú: 'end' (por defecto) o 'start'. Genera dropdown-menu-{align}.
    'align' => 'end',
])

{{-- Contenedor: fusiona las clases del consumidor (class="...") con la base del dropdown. --}}
<div {{ $attributes->class(['dropdown']) }}>
    {{-- Botón disparador: abre el menú con el toggle de Bootstrap/Tabler. --}}
    <a href="#"
       class="btn btn-{{ $variant }}@if ($arrow) dropdown-toggle @endif"
       data-bs-toggle="dropdown"
       aria-expanded="false">
        @if ($icon)
            <x-tabler::icon :name="$icon" class="me-1" />
        @endif
        {{ $label }}
    </a>

    {{-- Menú desplegable: el slot son los items (dropdown-item, divider, header...). --}}
    <div class="dropdown-menu dropdown-menu-{{ $align }}">
        {{ $slot }}
    </div>
</div>
