@props([
    // Marca este item como la página actual: añade la clase 'active' y
    // aria-current="page", y no lo envuelve en un enlace.
    'active' => false,

    // URL del enlace. Si se indica y el item no está activo, el contenido
    // se envuelve en un <a href>.
    'href' => null,
])

{{-- Item de breadcrumb de Tabler. Fusiona las clases del consumidor y añade
     aria-current solo cuando es la página actual. --}}
<li {{ $attributes->class(['breadcrumb-item', 'active' => $active])->merge(['aria-current' => $active ? 'page' : null]) }}>
    @if ($href && ! $active)
        <a href="{{ $href }}">{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</li>
