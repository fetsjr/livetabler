@props([
    // Titulo opcional de la seccion. Si se indica, se renderiza un dropdown-header.
    'heading' => null,
])

{{-- Agrupacion logica de items dentro del menu. No introduce un contenedor flex
     propio (el dropdown-menu ya apila los items en columna); solo aporta el
     encabezado de seccion de Tabler y reenvia el contenido. Las clases del
     consumidor se fusionan en el encabezado (su unico elemento propio). --}}
@if ($heading)
    <h6 {{ $attributes->class(['dropdown-header']) }}>{{ $heading }}</h6>
@endif

{{ $slot }}
