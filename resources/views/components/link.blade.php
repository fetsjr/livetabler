@props([
    // Color del enlace estilo Tabler: 'secondary', 'primary', 'danger', 'muted'... Null = enlace normal.
    'variant' => null,
])

{{-- Enlace de Tabler. Fusiona las clases del consumidor. --}}
<a {{ $attributes->class(['link-'.$variant => $variant]) }}>{{ $slot }}</a>
