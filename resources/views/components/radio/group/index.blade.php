@props([
    // Si true, dispone los radios en fila en vez de apilados.
    'inline' => false,
])

{{-- Agrupa varios radios de un mismo conjunto. --}}
<div {{ $attributes->class(['d-flex', 'flex-column' => ! $inline, 'flex-row flex-wrap gap-3' => $inline, 'gap-2' => ! $inline]) }}>
    {{ $slot }}
</div>
