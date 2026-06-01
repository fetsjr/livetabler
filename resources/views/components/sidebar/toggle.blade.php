@props([
    // Id del contenedor colapsable a controlar (sin '#'). Por defecto el del sidebar.
    'target' => 'sidebar-menu',
])

{{-- Botón hamburguesa fiel a Tabler: usa Bootstrap collapse (data-bs-toggle="collapse"),
     NO Alpine. Fusiona las clases del consumidor en el único class del raíz. --}}
<button type="button"
    data-bs-toggle="collapse"
    data-bs-target="#{{ $target }}"
    aria-controls="{{ $target }}"
    aria-expanded="false"
    aria-label="Toggle sidebar navigation"
    {{ $attributes->class(['navbar-toggler']) }}>
    <span class="navbar-toggler-icon"></span>
</button>
