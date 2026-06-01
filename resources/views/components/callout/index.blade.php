@props([
    // Variante de color: 'info' | 'success' | 'warning' | 'danger'.
    'variant' => 'info',
    // HTML del icono a mostrar (se inyecta sin escapar). Null = sin icono.
    'icon' => null,
])

@php
    // Normalizamos la variante a una de las soportadas por Tabler.
    $variante = in_array($variant, ['danger', 'warning', 'success']) ? $variant : 'info';
@endphp

{{-- Aviso destacado (estilo alerta) para notas e información. --}}
<div {{ $attributes->class(['alert', 'alert-'.$variante]) }} role="alert">
    <div class="d-flex">
        @if ($icon)
            <div class="pe-3">{!! $icon !!}</div>
        @endif
        <div>{{ $slot }}</div>
    </div>
</div>
