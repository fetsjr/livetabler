@props([
    // Etiqueta del contenedor para accesibilidad (aria-label del ul).
    // Describe la lista de navegacion para lectores de pantalla.
    'label' => 'Sidebar',
])

{{-- Lista de navegacion vertical estilo sidebar de Tabler.
     Raiz ul.navbar-nav: fusiona las clases del consumidor en un UNICO atributo class
     y anade el aria-label via merge(). Los hijos son los items y grupos de la familia,
     que emiten li.nav-item. --}}
<ul {{ $attributes->class(['navbar-nav'])->merge(['aria-label' => $label]) }}>
    {{ $slot }}
</ul>
