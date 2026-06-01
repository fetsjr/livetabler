@props([
    // Porcentaje de avance (0-100). Se usa como ancho de la barra interna.
    'value' => 0,

    // Color de la barra (bg-{variant}): primary, success, danger, blue, green...
    // Si es null, la barra usa el color por defecto de Tabler.
    'variant' => null,

    // Tamaño de la barra: 'sm' | 'md' | 'lg'. 'md' es el tamaño normal y no añade clase.
    'size' => 'md',

    // Si es true, muestra una barra de progreso indeterminado (animación continua).
    'indeterminate' => false,

    // Texto accesible opcional para lectores de pantalla (visually-hidden).
    'label' => null,
])

{{-- Barra de progreso de Tabler. La etiqueta raíz (.progress) fusiona las clases
     del consumidor en un único atributo class. --}}
<div {{ $attributes->class([
        'progress',                            // clase base de Tabler
        'progress-'.$size => $size !== 'md',   // progress-sm / progress-lg (md no añade clase)
    ]) }}>
    {{-- La barra interna NO es la raíz, así que aquí @class([...]) es correcto. --}}
    <div @class([
            'progress-bar',                                     // clase base de la barra
            'bg-'.$variant => $variant,                         // color opcional
            'progress-bar-indeterminate' => $indeterminate,     // progreso indeterminado
        ])
        style="width: {{ $indeterminate ? 100 : $value }}%"
        role="progressbar"
        aria-valuenow="{{ $value }}"
        aria-valuemin="0"
        aria-valuemax="100"
    >
        {{-- Texto accesible opcional para lectores de pantalla --}}
        @if ($label)
            <span class="visually-hidden">{{ $label }}</span>
        @endif
    </div>
</div>
