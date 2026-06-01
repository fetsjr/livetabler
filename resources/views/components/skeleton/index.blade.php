@props([
    // Efecto de brillo animado mientras carga.
    'glow' => true,
    // Si true, muestra un círculo (avatar) en vez de líneas de texto.
    'circle' => false,
    // Número de líneas de texto a simular.
    'lines' => 1,
    // Ancho (columna Bootstrap) de la línea única, p. ej. '100', '75'.
    'width' => '100',
    // Tamaño del placeholder (afecta circle/líneas): 'sm' | 'md' | 'lg'.
    'size' => 'md',
])

{{-- Contenedor de placeholders de Tabler. El brillo se activa con placeholder-glow. --}}
<div {{ $attributes->class(['placeholder-glow' => $glow]) }}>
    @if ($circle)
        {{-- Placeholder circular (tipo avatar) --}}
        <div @class([
            'placeholder rounded-circle',
            'avatar-'.$size => $size !== 'lg',
            'avatar-xl' => $size === 'lg',
        ])></div>
    @else
        {{-- Una o varias líneas de texto simuladas --}}
        @for ($i = 0; $i < $lines; $i++)
            <div @class([
                'placeholder',
                'w-100' => $lines > 1,
                'col-'.$width => $lines === 1,
                'placeholder-'.$size => $size !== 'md',
                'mb-2' => $lines > 1 && $i < $lines - 1,
            ])></div>
        @endfor
    @endif
</div>
