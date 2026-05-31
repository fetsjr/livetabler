@props([
    // Variante visual del botón.
    // Valores especiales: 'outline', 'ghost', 'link'. Cualquier otro valor se trata como
    // un color de Tabler directo (p. ej. variant="danger" -> btn-danger).
    'variant' => 'primary',

    // Color base de Tabler usado por las variantes 'outline' y 'ghost'
    // (primary, secondary, success, danger, warning, info...).
    // OJO: solo aplica a 'outline' y 'ghost'; en las demás variantes se ignora.
    'color' => 'primary',

    // Tamaño del botón: 'sm' | 'md' | 'lg'. 'md' es el tamaño normal y no añade clase.
    'size' => 'md',

    // Nombre del icono Tabler que se muestra ANTES del texto (sin el prefijo "ti-").
    'icon' => null,

    // Nombre del icono Tabler que se muestra DESPUÉS del texto.
    'iconTrailing' => null,

    // Si es true, muestra el indicador de carga y deshabilita el botón.
    'loading' => false,

    // Bordes completamente redondeados (forma de píldora).
    'pill' => false,

    // Botón cuadrado (mismo alto y ancho), ideal para botones de solo icono.
    'square' => false,

    // Si se indica, el componente se renderiza como enlace <a> hacia esta URL.
    'href' => null,

    // Etiqueta HTML a usar: 'button' o 'a'. Si hay href, se fuerza a 'a'.
    'as' => 'button',

    // Tipo del botón cuando se renderiza como <button>: 'button' | 'submit' | 'reset'.
    'type' => 'button',
])

@php
    // Si se pasa href, el botón SIEMPRE se renderiza como enlace <a>.
    $etiqueta = $href !== null ? 'a' : $as;

    // ¿El botón tiene texto/contenido? Si no, lo tratamos como botón de solo icono.
    $tieneTexto = ! $slot->isEmpty();

    // Traducimos la variante a la clase de color de Tabler correspondiente.
    $claseVariante = match ($variant) {
        'outline' => 'btn-outline-'.$color,   // botón con borde de color y fondo transparente
        'ghost'   => 'btn-ghost-'.$color,     // botón sin fondo que se colorea al pasar el ratón
        'link'    => 'btn-link',              // se ve como un enlace de texto
        default   => 'btn-'.$variant,         // 'primary', 'secondary' o un color directo
    };

    // Atributos propios según la etiqueta. Se pasan por merge() para que el consumidor
    // pueda sobrescribirlos y para no duplicar atributos.
    $atributosEtiqueta = $etiqueta === 'a'
        ? ['href' => $href ?? '#']   // enlace: usa href (o '#' si se fuerza as="a" sin href)
        : ['type' => $type];         // botón: tipo button/submit/reset

    // Un <a> no admite el atributo disabled real; si está cargando, lo deshabilitamos
    // de forma accesible para que no sea navegable ni enfocable con el teclado.
    if ($etiqueta === 'a' && $loading) {
        $atributosEtiqueta['aria-disabled'] = 'true';
        $atributosEtiqueta['tabindex'] = '-1';
    }

    // Cuando es un <button> en estado de carga, lo deshabilitamos de verdad
    // (no solo con la clase visual), para que no se pueda pulsar ni enviar.
    if ($etiqueta === 'button' && $loading) {
        $atributosEtiqueta['disabled'] = 'disabled';
    }
@endphp

{{-- Fusionamos las clases calculadas y los atributos propios con los que ponga el
     consumidor (class="...", id="...", etc.), produciendo un único atributo class. --}}
<{{ $etiqueta }} {{ $attributes->class([
        'btn',                                              // clase base de Tabler
        'btn-'.$size => $size !== 'md',                     // btn-sm / btn-lg (md no añade clase)
        'btn-pill' => $pill,                                // forma de píldora
        'btn-square' => $square,                            // botón cuadrado
        'btn-icon' => ! $tieneTexto && ($icon || $loading),// botón de solo icono
        'btn-loading disabled' => $loading,                // estado de carga (deshabilitado)
        $claseVariante,                                     // clase de color/variante calculada
    ])->merge($atributosEtiqueta) }}>
    {{-- Icono inicial (no se muestra mientras carga, para no chocar con el spinner) --}}
    @if ($icon && ! $loading)
        <x-tabler::icon :name="$icon" @class(['me-2' => $tieneTexto]) />
    @endif

    {{ $slot }}

    {{-- Icono final --}}
    @if ($iconTrailing && ! $loading)
        <x-tabler::icon :name="$iconTrailing" @class(['ms-2' => $tieneTexto]) />
    @endif
</{{ $etiqueta }}>
