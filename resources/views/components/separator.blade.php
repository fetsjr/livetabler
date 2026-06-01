@props([
    // Línea vertical en vez de horizontal.
    'vertical' => false,
    // Si se indica, muestra una separación con texto centrado (hr-text).
    'text' => null,
])

{{-- Separador de Tabler. Con texto usa hr-text; si no, un <hr> (vertical opcional).
     En ambos casos fusiona las clases del consumidor. --}}
@if ($text)
    <div {{ $attributes->class(['hr-text']) }}>{{ $text }}</div>
@else
    <hr {{ $attributes->class(['hr-vertical' => $vertical, 'my-3']) }}>
@endif
