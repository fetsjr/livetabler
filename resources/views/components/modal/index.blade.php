@props([
    // id del modal (para abrirlo con data-bs-target="#id"). Si es null se genera uno.
    'id' => null,
    // Tamaño del diálogo: 'sm' | 'md' | 'lg' | 'xl'. 'md' no añade clase.
    'size' => 'md',
    // Título mostrado en la cabecera.
    'title' => '',
    // Si true, el cuerpo del modal hace scroll cuando es largo.
    'scrollable' => false,
    // Color de Tabler para la barra de estado superior. Null = sin barra.
    'status' => null,
])

@php
    // id efectivo: el indicado o uno generado.
    $modalId = $id ?? 'modal-'.uniqid();
@endphp

<div {{ $attributes->class(['modal', 'modal-blur', 'fade'])->merge(['id' => $modalId, 'tabindex' => '-1', 'role' => 'dialog', 'aria-hidden' => 'true']) }}>
    <div @class(['modal-dialog', 'modal-dialog-centered', 'modal-'.$size => $size !== 'md', 'modal-dialog-scrollable' => $scrollable]) role="document">
        <div class="modal-content">
            {{-- Barra de estado superior de color --}}
            @if ($status)
                <div class="modal-status bg-{{ $status }}"></div>
            @endif

            {{-- Cabecera con título y botón de cerrar --}}
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Cuerpo --}}
            <div class="modal-body">
                {{ $slot }}
            </div>

            {{-- Pie opcional --}}
            @isset($footer)
                <div class="modal-footer">{{ $footer }}</div>
            @endisset
        </div>
    </div>
</div>
