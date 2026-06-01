@props([
    // Nombre del icono Tabler (SIN prefijo "ti-") mostrado antes del texto. Opcional.
    'icon' => null,

    // Si se indica, el item se renderiza como enlace; si no, como boton.
    'href' => null,

    // Marca el item como activo (resaltado): clase 'active'.
    'active' => false,

    // Deshabilita el item: clase 'disabled' (+ aria-disabled en enlaces).
    'disabled' => false,

    // Variante destructiva: texto en rojo (clase 'text-danger').
    'danger' => false,

    // Texto de atajo de teclado alineado a la derecha. Opcional.
    'shortcut' => null,
])

@php
    // Sin href => boton (accion JS); con href => enlace de navegacion.
    $tag = $href !== null ? 'a' : 'button';

    // Atributos propios de cada etiqueta, via merge() para no duplicar.
    $atributosEtiqueta = $tag === 'a'
        ? ['href' => $href]
        : ['type' => 'button'];

    // Un enlace no admite disabled real; lo marcamos de forma accesible.
    if ($tag === 'a' && $disabled) {
        $atributosEtiqueta['aria-disabled'] = 'true';
        $atributosEtiqueta['tabindex'] = '-1';
    }

    // Un boton si admite disabled nativo.
    if ($tag === 'button' && $disabled) {
        $atributosEtiqueta['disabled'] = 'disabled';
    }

    // Rol de item de menu (ARIA) y marca de item activo. El valor null hace que Blade
    // OMITA el atributo cuando no aplica: 'page' para enlaces, 'true' para botones.
    $atributosEtiqueta['role'] = 'menuitem';
    $atributosEtiqueta['aria-current'] = $active ? ($tag === 'a' ? 'page' : 'true') : null;
@endphp

{{-- Item del menu desplegable de Tabler. Fusiona las clases del consumidor una sola vez. --}}
<{{ $tag }} {{ $attributes->class([
        'dropdown-item',          // clase base de Tabler
        'active' => $active,      // estado activo
        'disabled' => $disabled,  // estado deshabilitado
        'text-danger' => $danger, // variante destructiva
    ])->merge($atributosEtiqueta) }}>
    {{-- Icono opcional con la clase especifica de item de dropdown. --}}
    @if ($icon)
        <x-tabler::icon :name="$icon" class="dropdown-item-icon" />
    @endif

    {{ $slot }}

    {{-- Atajo de teclado empujado a la derecha. --}}
    @if ($shortcut)
        <span class="dropdown-item-indicator ms-auto text-secondary">{{ $shortcut }}</span>
    @endif
</{{ $tag }}>
