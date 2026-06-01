@props([
    // Nombre del icono Tabler (sin el prefijo "ti-") que se muestra antes del titulo.
    'icon' => null,

    // URL de destino. Si se indica, el enlace interno apunta aqui; si no, usa '#'.
    'href' => null,

    // Marca el item como activo: anade la clase 'active' al li y aria-current="page".
    'active' => false,

    // Texto del item. Tiene prioridad el slot; si esta vacio se usa este title.
    'title' => null,

    // Atajo opcional: si se pasa un valor, renderiza un badge de notificacion
    // sobre el item con ese contenido (p. ej. un contador).
    'badge' => null,

    // Color Tabler del badge de notificacion cuando se usa el atajo 'badge'.
    'badgeColor' => 'red',
])

{{-- El elemento RAIZ es el li.nav-item de Tabler. Fusiona las clases del
     consumidor en un unico atributo class; 'active' se anade segun la prop. --}}
<li {{ $attributes->class([
        'nav-item',            // clase base Tabler del item de navbar
        'active' => $active,   // resalta el item activo
    ]) }}>
    {{-- El enlace nav-link; aria-current marca accesiblemente el item activo. --}}
    <a
        href="{{ $href ?? '#' }}"
        class="nav-link"
        @if ($active) aria-current="page" @endif
    >
        {{-- Icono opcional dentro de su contenedor Tabler nav-link-icon. --}}
        @if ($icon)
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <x-tabler::icon :name="$icon" />
            </span>
        @endif

        {{-- Titulo: el slot tiene prioridad; si esta vacio se usa la prop title. --}}
        <span class="nav-link-title">
            {{ $slot->isEmpty() ? $title : $slot }}
        </span>

        {{-- Atajo de badge de notificacion sobre el item. --}}
        @if ($badge !== null)
            <x-tabler::navbar.badge :color="$badgeColor">{{ $badge }}</x-tabler::navbar.badge>
        @endif
    </a>
</li>
