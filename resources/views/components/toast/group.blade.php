@props([
    // Posicion del contenedor de toasts en la ventana.
    // 'top-left' | 'top-right' | 'bottom-left' | 'bottom-right'.
    'position' => 'bottom-right',

    // Milisegundos que permanece visible un toast dinamico antes de auto-cerrarse.
    // El consumidor puede sobrescribirlo por toast con la propiedad timeout del detalle.
    'timeout' => 5000,
])

@php
    // Traducimos la posicion publica a las clases de utilidad reales de Tabler/Bootstrap.
    // El contenedor toast-container ya fija position absolute + z-index 1090 por CSS;
    // anadimos position-fixed para anclarlo al viewport y la esquina correspondiente.
    $clasePosicion = match ($position) {
        'top-left'    => 'top-0 start-0',
        'top-right'   => 'top-0 end-0',
        'bottom-left' => 'bottom-0 start-0',
        default       => 'bottom-0 end-0',   // bottom-right
    };
@endphp

{{-- Contenedor que apila los toasts. Aloja el estado Alpine y escucha el evento
     global de mostrar toast para anadir toasts dinamicos desde cualquier parte de la app.
     El contenedor toast-container ya aplica margin-bottom automatico entre toasts
     (variable CSS de spacing), pointer-events:none y z-index, por lo que NO anadimos
     mb-*, gap-* ni z-index en linea. --}}
<div
    x-data="{
        toasts: [],
        defaultTimeout: {{ (int) $timeout }},
        add(toast) {
            toast.id = toast.id ?? (Date.now() + Math.random());
            this.toasts.push(toast);
            const wait = toast.timeout ?? this.defaultTimeout;
            if (wait > 0) {
                setTimeout(() => this.remove(toast.id), wait);
            }
        },
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    @toast-show.window="add($event.detail || {})"
    {{ $attributes->class(['toast-container', 'position-fixed', 'p-3', $clasePosicion]) }}
>
    {{-- Toasts dinamicos generados desde el evento global de mostrar toast. --}}
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition.opacity
            class="toast show"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
        >
            {{-- Cabecera: solo se renderiza si el toast trae titulo. --}}
            <template x-if="toast.title">
                <div class="toast-header">
                    {{-- Punto de color segun el tipo del toast (success/danger/warning/info). --}}
                    <span
                        class="rounded me-2"
                        :class="{
                            'bg-success': toast.type === 'success',
                            'bg-danger':  toast.type === 'error' || toast.type === 'danger',
                            'bg-warning': toast.type === 'warning',
                            'bg-info':    ! toast.type || toast.type === 'info'
                        }"
                        style="width: 1rem; height: 1rem;"
                    ></span>
                    <strong class="me-auto" x-text="toast.title"></strong>
                    <button
                        type="button"
                        class="ms-2 btn-close"
                        aria-label="Close"
                        @click="remove(toast.id)"
                    ></button>
                </div>
            </template>

            {{-- Cuerpo del toast. Acepta la propiedad text o message del detalle. --}}
            <div class="toast-body">
                <span x-text="toast.text ?? toast.message ?? ''"></span>
                {{-- Si el toast NO tiene cabecera, ofrecemos un boton de cierre en el cuerpo. --}}
                <template x-if="! toast.title">
                    <button
                        type="button"
                        class="ms-2 btn-close"
                        aria-label="Close"
                        @click="remove(toast.id)"
                    ></button>
                </template>
            </div>
        </div>
    </template>

    {{-- Toasts estaticos/declarativos colocados por el consumidor (toast individual). --}}
    {{ $slot }}
</div>
