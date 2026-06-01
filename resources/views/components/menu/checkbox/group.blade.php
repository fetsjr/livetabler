@props([
    // Titulo opcional de la seccion de checkboxes (dropdown-header).
    'heading' => null,
])

{{-- Contenedor logico de items checkbox. No introduce un div flex propio (el
     dropdown-menu ya apila los items). Cada checkbox es un input nativo
     independiente (patron de filtros de Tabler); el estado no se gestiona aqui.
     Solo aporta el encabezado opcional y reenvia los items. --}}
@if ($heading)
    <h6 {{ $attributes->class(['dropdown-header']) }}>{{ $heading }}</h6>
@endif

{{ $slot }}
