@props([
    // Nombre del icono Tabler (sin el prefijo "ti-") mostrado antes del texto. null = sin icono.
    'icon' => null,

    // URL del item. Si se indica, se renderiza como <a>; si no, como boton type="button".
    'href' => null,

    // Marca el item como activo (clase 'active' de Tabler) para resaltar la opcion actual.
    'active' => false,

    // Marca el item como deshabilitado (clase 'disabled' de Tabler).
    'disabled' => false,
])

@php
    // Sin href el item es un boton de accion; con href, un enlace de navegacion.
    $tag = $href ? 'a' : 'button';
@endphp

{{-- Item del menu. La raiz fusiona las clases del consumidor con la base dropdown-item
     y las modificadoras (active/disabled) en un unico atributo class. Los atributos propios
     (href o type) se pasan por merge() para que el consumidor pueda sobrescribirlos. --}}
<{{ $tag }} {{ $attributes->class([
        'dropdown-item',                 // clase base de Tabler
        'active' => $active,             // opcion actual resaltada
        'disabled' => $disabled,         // opcion no disponible
    ])->merge($href ? ['href' => $href] : ['type' => 'button']) }}>
    {{-- Icono inicial opcional, con la clase de icono de item de Tabler. --}}
    @if ($icon)
        <x-tabler::icon :name="$icon" class="dropdown-item-icon" />
    @endif
    {{ $slot }}
</{{ $tag }}>
