@props([
    // URL de destino al pulsar la marca.
    'href' => '/',
    // URL del logo (imagen). Si es null, se muestra el contenido del slot (texto).
    'logo' => null,
])

{{-- Marca del sidebar. Clases reales de Tabler: navbar-brand + navbar-brand-autodark.
     El raíz es el enlace y fusiona las clases del consumidor en un único class. --}}
<a href="{{ $href }}" {{ $attributes->class(['navbar-brand', 'navbar-brand-autodark']) }}>
    @if ($logo)
        <img src="{{ $logo }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
    @endif
    {{ $slot }}
</a>
