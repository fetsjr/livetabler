@props([
    // Si true, dispone las casillas en fila en vez de apiladas.
    'inline' => false,
])

{{-- Agrupa varias casillas (checkbox) relacionadas. --}}
<div {{ $attributes->class(['d-flex', 'flex-column' => ! $inline, 'flex-row flex-wrap gap-3' => $inline, 'gap-2' => ! $inline]) }}>
    {{ $slot }}
</div>
