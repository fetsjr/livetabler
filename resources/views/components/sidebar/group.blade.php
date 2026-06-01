@props([
    // Título de la sección (subheader). Si es null, no se muestra encabezado.
    'heading' => null,
])

{{-- El grupo vive dentro de un ul.navbar-nav, por eso el raíz es un li.
     No lleva 'nav-item' para no parecer un enlace; es un contenedor de sección.
     Fusionamos las clases del consumidor en el li raíz. --}}
<li {{ $attributes->class(['mt-3']) }}>
    @if ($heading)
        {{-- Subtítulo de sección con clases reales de Tabler (mayúsculas, atenuado) --}}
        <div class="hr-text hr-text-left text-uppercase text-secondary px-3">{{ $heading }}</div>
    @endif
    {{-- Sub-lista con los items del grupo. navbar-nav anidado mantiene el estilo Tabler. --}}
    <ul class="navbar-nav">
        {{ $slot }}
    </ul>
</li>
