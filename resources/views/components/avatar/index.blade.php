@props([
    // Tamaño del avatar: 'xs' | 'sm' | 'md' | 'lg' | 'xl'. 'md' es el normal y no añade clase.
    'size' => 'md',

    // Forma del avatar: 'rounded' (por defecto) o 'circle' (círculo perfecto).
    'shape' => 'rounded',

    // Color de Tabler para el fondo suave (subtle). Genera bg-{color}-lt. null = sin color.
    'color' => null,

    // URL de la imagen de fondo del avatar. Si se indica, no se muestra icono ni iniciales.
    'src' => null,

    // Nombre del icono Tabler a mostrar (sin el prefijo "ti-"). Solo si no hay src.
    'icon' => null,

    // Iniciales de texto a mostrar (p. ej. "JD"). Solo si no hay src ni icon.
    'initials' => null,

    // Color de Tabler para un pequeño badge de estado (online/offline/etc.). null = sin estado.
    'status' => null,
])

@php
    // Atributos propios. Si hay imagen, la pasamos como background-image por merge()
    // para que termine dentro del mismo attribute bag que la clase del consumidor.
    $atributosPropios = $src
        ? ['style' => "background-image: url({$src})"]
        : [];
@endphp

{{-- La etiqueta raíz fusiona las clases calculadas y el estilo con lo que ponga el
     consumidor (class="...", id="...", etc.), produciendo un único atributo class. --}}
<span {{ $attributes->class([
        'avatar',                                  // clase base de Tabler
        'avatar-'.$size => $size !== 'md',         // avatar-xs/sm/lg/xl (md no añade clase)
        'rounded-circle' => $shape === 'circle',   // forma de círculo perfecto
        'bg-'.$color.'-lt' => $color,              // fondo suave de color
    ])->merge($atributosPropios) }}>
    {{-- Contenido visible solo cuando NO hay imagen de fondo --}}
    @if (! $src)
        @if ($icon)
            <x-tabler::icon :name="$icon" />
        @else
            {{ $initials ?? $slot }}
        @endif
    @endif

    {{-- Badge de estado opcional (un punto de color en la esquina del avatar) --}}
    @if ($status)
        <span class="badge bg-{{ $status }}"></span>
    @endif
</span>
