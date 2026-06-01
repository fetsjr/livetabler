@props([
    // Color del badge. En modo normal pinta el fondo (bg-{variant}); en modo
    // outline tiñe el texto y el borde (text-{variant}). Cualquier color de Tabler.
    'variant' => 'primary',

    // Si es true, el badge se reduce a un punto sin texto (badge-dot).
    'dot' => false,

    // Si es true, badge con borde y fondo transparente (badge-outline + text-{variant}).
    'outline' => false,

    // Si es true, badge con esquinas redondeadas tipo píldora (badge-pill).
    'pill' => false,

    // Nombre del icono Tabler (sin el prefijo "ti-") que se muestra antes del texto.
    'icon' => null,

    // Texto a mostrar cuando no se pasa contenido por el slot.
    'label' => '',
])

@php
    // El color se aplica de forma distinta según el modo:
    // - outline: el color va al texto/borde (text-{variant}); el fondo es transparente.
    // - normal: el color va al fondo (bg-{variant}).
    $claseColor = $outline ? 'text-'.$variant : 'bg-'.$variant;
@endphp

{{-- Badge de Tabler. La etiqueta raíz fusiona las clases del consumidor en un
     único atributo class. --}}
<span {{ $attributes->class([
        'badge',                     // clase base de Tabler
        'badge-dot' => $dot,         // punto sin texto
        'badge-outline' => $outline, // borde con fondo transparente
        'badge-pill' => $pill,       // esquinas redondeadas
        $claseColor,                 // color (fondo o texto según el modo)
    ]) }}>
    {{-- Icono opcional antes del texto --}}
    @if ($icon)
        <x-tabler::icon :name="$icon" class="me-1" />
    @endif

    {{-- El slot tiene prioridad; si está vacío se usa el label. --}}
    {{ $slot->isEmpty() ? $label : $slot }}
</span>
