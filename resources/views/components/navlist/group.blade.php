@props([
    // Titulo de la seccion que agrupa varios items. Si es null, el grupo es
    // "transparente": no muestra encabezado, pero SIGUE teniendo una raiz que
    // absorbe los atributos del consumidor (class/id/data-*).
    'heading' => null,
])

{{-- Grupo de items dentro del ul.navbar-nav del navlist. El grupo SIEMPRE tiene una
     raiz <li> que fusiona las clases del consumidor (una sola vez), tanto con heading
     como sin el (asi no se descartan silenciosamente los atributos del consumidor).
     Con heading, la raiz es el li de encabezado con su estilo; sin heading, la raiz es
     un li.nav-item transparente con role="presentation". Los items van en el slot. --}}
@if ($heading)
    <li {{ $attributes->class([
        'nav-item', 'mt-2', 'px-3', 'py-1',
        'text-muted', 'text-uppercase', 'small', 'fw-bold',
    ]) }}>
        {{ $heading }}
    </li>

    {{-- Items del grupo: ya son li.nav-item emitidos por navlist.item. --}}
    {{ $slot }}
@else
    <li {{ $attributes->class(['nav-item'])->merge(['role' => 'presentation']) }}>
        {{-- Items del grupo: ya son li.nav-item emitidos por navlist.item. --}}
        {{ $slot }}
    </li>
@endif
