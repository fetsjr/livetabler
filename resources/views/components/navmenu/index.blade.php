@props([
    // Alineacion del menu respecto al disparador: 'start' o 'end'.
    // 'end' anade dropdown-menu-end (alinea el borde derecho del menu con el disparador).
    // 'start' es el comportamiento por defecto de Bootstrap y no anade clase.
    'align' => 'start',

    // Si es true, muestra la flechita que apunta al disparador (dropdown-menu-arrow de Tabler).
    'arrow' => false,
])

{{-- Contenedor del submenu de navegacion. Markup nativo de Tabler: Bootstrap anade/quita
     la clase show al abrir/cerrar mediante el disparador con data-bs-toggle="dropdown",
     por eso aqui NO forzamos 'show' ni usamos Alpine. Fusiona las clases del consumidor
     al final con $attributes->class([...]) en un unico atributo class. --}}
<div {{ $attributes->class([
    'dropdown-menu',                            // clase base de Tabler
    'dropdown-menu-end' => $align === 'end',    // alinea a la derecha del disparador
    'dropdown-menu-arrow' => $arrow,            // flechita opcional hacia el disparador
]) }}>
    {{ $slot }}
</div>
