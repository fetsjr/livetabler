@props([
    // Si es true, las pestañas ocupan todo el ancho disponible (clase Tabler nav-fill).
    'fill' => false,
])

{{-- Barra de pestañas: <ul class="nav nav-tabs"> de Tabler.
     role="tablist" para accesibilidad. SIN data-bs-toggle: el control es 100% Alpine. --}}
<ul
    {{ $attributes->class(['nav', 'nav-tabs', 'nav-fill' => $fill])->merge(['role' => 'tablist']) }}
>
    {{ $slot }}
</ul>
