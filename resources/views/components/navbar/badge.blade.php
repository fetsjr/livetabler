@props([
    // Color Tabler del badge: red, green, blue, yellow, azure, secondary...
    // Se aplica como text-bg-{color}, que fija fondo Y color de texto legible.
    'color' => 'red',

    // Si es true, oculta el texto y muestra solo un punto (badge sin contenido).
    'dot' => false,

    // Si es true, el badge parpadea para llamar la atención (badge-blink de Tabler).
    'blink' => false,
])

{{-- Indicador de notificación posicionado en la esquina superior derecha del item.
     El elemento RAIZ fusiona las clases del consumidor en un unico atributo class.
     'badge-notification' es la clase Tabler que posiciona el badge sobre el padre.
     OJO: requiere un ancestro position:relative; .nav-link no lo es, por eso el
     atajo 'badge' de navbar.item usa un badge inline, no este componente. --}}
<span {{ $attributes->class([
        'badge',                 // clase base Tabler del badge
        'badge-notification',    // posiciona en la esquina superior derecha
        'badge-blink' => $blink, // parpadeo opcional
        'text-bg-'.$color,       // fondo Y texto legible (text-bg-red, text-bg-green...)
    ]) }}>
    {{-- Si es 'dot' no se muestra contenido; si no, se vuelca el slot. --}}
    @unless ($dot)
        {{ $slot }}
    @endunless
</span>
