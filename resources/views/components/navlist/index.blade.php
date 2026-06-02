@props([
    // Etiqueta del contenedor para accesibilidad (aria-label del ul).
    // Describe la lista de navegacion para lectores de pantalla.
    'label' => 'Sidebar',
])

{{-- Lista de navegacion estilo sidebar de Tabler.
     Raiz ul.navbar-nav: fusiona las clases del consumidor en un UNICO atributo class
     y anade el aria-label via merge(). Los hijos son los items y grupos de la familia,
     que emiten li.nav-item.

     ORIENTACION: 'navbar-nav' por si solo es HORIZONTAL en Bootstrap. Para la lista
     vertical de sidebar, este navlist debe vivir dentro de un contenedor
     '.navbar-vertical' (o un <aside>) que aplica flex-direction:column a .navbar-nav.
     Aislado (p. ej. en los tests) se renderiza en fila, no en columna. --}}
<ul {{ $attributes->class(['navbar-nav'])->merge(['aria-label' => $label]) }}>
    {{ $slot }}
</ul>
