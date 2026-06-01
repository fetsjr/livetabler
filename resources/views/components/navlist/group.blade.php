@props([
    // Titulo de la seccion que agrupa varios items. Si es null, el grupo es
    // "transparente": solo emite los items del slot sin encabezado.
    'heading' => null,
])

{{-- Grupo de items dentro del ul.navbar-nav del navlist.
     Cuando hay heading, el li de encabezado es el raiz que fusiona las clases del
     consumidor (una sola vez). Los items del slot van despues como hermanos li. --}}
@if ($heading)
    <li {{ $attributes->class([
        'nav-item', 'mt-2', 'px-3', 'py-1',
        'text-muted', 'text-uppercase', 'small', 'fw-bold',
    ]) }}>
        {{ $heading }}
    </li>
@endif

{{-- Items del grupo: ya son li.nav-item emitidos por navlist.item. --}}
{{ $slot }}
