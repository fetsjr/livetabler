@props([
    // Titulo mostrado en la cabecera (toast-header). Si es null o vacio no se renderiza cabecera.
    'title' => null,

    // Texto secundario a la derecha de la cabecera (p. ej. "11 mins ago"). Opcional.
    'meta' => null,

    // Punto de color a la izquierda del titulo: color de Tabler (primary, success, danger...).
    // Null = sin punto de color.
    'color' => null,

    // Si es true, el toast se cierra solo tras 'delay' ms. Si es false, permanece hasta cerrarlo.
    'autohide' => true,

    // Milisegundos antes del auto-cierre cuando autohide es true.
    'delay' => 5000,

    // Si es true, muestra el boton de cierre (btn-close) en la cabecera.
    'dismissible' => true,
])

@php
    // Renderizamos cabecera solo si hay titulo (la cabecera de Tabler gira en torno al titulo).
    $tieneCabecera = ! empty($title);

    // Normalizamos a entero el retardo para inyectarlo seguro en el x-data de Alpine.
    $retardo = (int) $delay;
@endphp

{{-- Toast individual de Tabler. El comportamiento (mostrar/ocultar/auto-cierre) lo controla
     Alpine localmente; el estilo es 100% Tabler (clases toast/toast-header/toast-body).
     Como en CSS un toast sin la clase show queda oculto, ligamos la clase show a x-show
     mediante :class para que sea visible mientras Alpine lo mantenga abierto. --}}
<div
    x-data="{
        visible: true,
        autohide: {{ $autohide ? 'true' : 'false' }},
        delay: {{ $retardo }},
        dismiss() { this.visible = false; },
        init() {
            if (this.autohide && this.delay > 0) {
                setTimeout(() => this.dismiss(), this.delay);
            }
        }
    }"
    x-show="visible"
    x-transition.opacity
    :class="{ 'show': visible }"
    {{ $attributes->class(['toast'])->merge([
        'role' => 'alert',
        'aria-live' => 'assertive',
        'aria-atomic' => 'true',
    ]) }}
>
    {{-- Cabecera: punto de color opcional + titulo + meta + boton de cierre. --}}
    @if ($tieneCabecera)
        <div class="toast-header">
            @if ($color)
                {{-- Punto de color a la izquierda del titulo. --}}
                <span class="bg-{{ $color }} rounded me-2" style="width: 1rem; height: 1rem;"></span>
            @endif
            <strong class="me-auto">{{ $title }}</strong>
            @if ($meta)
                <small class="text-secondary">{{ $meta }}</small>
            @endif
            @if ($dismissible)
                <button type="button" class="ms-2 btn-close" aria-label="Close" @click="dismiss()"></button>
            @endif
        </div>
    @endif

    {{-- Cuerpo del toast: contenido del slot. --}}
    <div class="toast-body">
        {{ $slot }}
        {{-- Si NO hay cabecera pero si boton de cierre, lo mostramos junto al cuerpo. --}}
        @if (! $tieneCabecera && $dismissible)
            <button type="button" class="ms-2 btn-close float-end" aria-label="Close" @click="dismiss()"></button>
        @endif
    </div>
</div>
