@props([
    // Nombre compartido del grupo de radios. Documental: el consumidor debe pasar
    // el mismo name a cada radio hijo para que sean excluyentes (los componentes
    // anonimos no propagan props a sus hijos automaticamente).
    'name' => null,

    // Titulo opcional de la seccion (dropdown-header).
    'heading' => null,
])

{{-- Contenedor logico de items radio. No introduce un div flex propio (el
     dropdown-menu ya apila los items). Aporta el encabezado opcional y reenvia
     los radios. --}}
@if ($heading)
    <h6 {{ $attributes->class(['dropdown-header']) }}>{{ $heading }}</h6>
@endif

{{ $slot }}
