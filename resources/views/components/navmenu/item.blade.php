@props([
    // Nombre del icono Tabler (sin el prefijo "ti-") mostrado antes del texto. null = sin icono.
    'icon' => null,

    // URL del item. Si se indica, se renderiza como <a>; si no, como boton type="button".
    'href' => null,

    // Marca el item como activo (clase 'active' de Tabler) y emite aria-current="page".
    'active' => false,

    // Deshabilita el item: clase 'disabled' + atributo funcional (disabled en <button>,
    // aria-disabled + tabindex=-1 en <a>, ya que un <a> deshabilitado de Bootstrap es solo visual).
    'disabled' => false,
])

@php
    // Sin href el item es un boton de accion; con href, un enlace de navegacion.
    $tag = $href ? 'a' : 'button';

    // Atributos propios de cada etiqueta, via merge() para no duplicar.
    $atributosEtiqueta = $tag === 'a'
        ? ['href' => $href]
        : ['type' => 'button'];

    // Un enlace no admite disabled real; lo marcamos de forma accesible
    // (un <a class="disabled"> de Bootstrap es solo visual: sigue navegable).
    if ($tag === 'a' && $disabled) {
        $atributosEtiqueta['aria-disabled'] = 'true';
        $atributosEtiqueta['tabindex'] = '-1';
    }

    // Un boton si admite el atributo disabled nativo.
    if ($tag === 'button' && $disabled) {
        $atributosEtiqueta['disabled'] = 'disabled';
    }

    // Marca de item activo. El valor null hace que Blade OMITA el atributo cuando no aplica.
    $atributosEtiqueta['aria-current'] = $active ? 'page' : null;
@endphp

{{-- Item del menu. La raiz fusiona las clases del consumidor con la base dropdown-item
     y las modificadoras (active/disabled) en un unico atributo class. Los atributos propios
     (href o type) se pasan por merge() para que el consumidor pueda sobrescribirlos. --}}
<{{ $tag }} {{ $attributes->class([
        'dropdown-item',                 // clase base de Tabler
        'active' => $active,             // opcion actual resaltada
        'disabled' => $disabled,         // opcion no disponible
    ])->merge($atributosEtiqueta) }}>
    {{-- Icono inicial opcional, con la clase de icono de item de Tabler. --}}
    @if ($icon)
        <x-tabler::icon :name="$icon" class="dropdown-item-icon" />
    @endif
    {{ $slot }}
</{{ $tag }}>
