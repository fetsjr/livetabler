@props([
    // Si es true fija la barra lateral en la parte superior al hacer scroll (sticky-top).
    'sticky' => false,
])

{{-- Barra lateral vertical de Tabler. Fusiona las clases del consumidor en un único
     atributo class; usa la forma con clave para que sticky-top quede contiguo. --}}
<aside {{ $attributes->class([
    'navbar navbar-vertical navbar-expand-lg d-flex flex-column h-100',
    'sticky-top' => $sticky,
]) }}>
    {{-- Contenedor interno con scroll vertical para el contenido del menú. --}}
    <div class="container-fluid overflow-y-auto">
        {{ $slot }}
    </div>
</aside>
