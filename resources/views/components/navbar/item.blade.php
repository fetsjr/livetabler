@props([
    // Nombre del icono Tabler (sin el prefijo "ti-") que se muestra antes del titulo.
    'icon' => null,

    // URL de destino. Si se indica, el enlace interno apunta aqui; si no, usa '#'.
    'href' => null,

    // Marca el item como activo: anade la clase 'active' al li y aria-current="page".
    'active' => false,

    // Texto del item. Tiene prioridad el slot; si esta vacio se usa este title.
    'title' => null,

    // Atajo opcional: si se pasa un valor, renderiza un badge INLINE de Tabler
    // dentro del nav-link con ese contenido (p. ej. un contador).
    'badge' => null,

    // Color Tabler del badge cuando se usa el atajo 'badge' (text-bg-{color}).
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

        {{-- Atajo de badge INLINE al estilo oficial de Tabler (no 'badge-notification'
             absoluto: .nav-link no es position:relative, asi que se anclaria mal).
             text-bg-{color} fija fondo y texto legible. El span visually-hidden da
             contexto accesible al contador para lectores de pantalla. --}}
        @if ($badge !== null)
            <span class="badge badge-sm bg-{{ $badgeColor }} text-{{ $badgeColor }}-fg ms-auto">
                {{ $badge }}
                <span class="visually-hidden">notificaciones</span>
            </span>
        @endif
    </a>
</li>
