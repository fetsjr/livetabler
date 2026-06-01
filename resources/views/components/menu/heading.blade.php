{{-- Encabezado de seccion dentro del menu desplegable de Tabler.
     Fusiona las clases del consumidor una sola vez. --}}
<h6 {{ $attributes->class(['dropdown-header']) }}>
    {{ $slot }}
</h6>
