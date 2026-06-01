@props([
    // Texto que se muestra dentro del tooltip (se vuelca en el atributo title).
    'text' => null,
    // Posición del tooltip respecto al elemento: 'top', 'bottom', 'left', 'right'.
    'position' => 'top',
])

{{-- Envoltura de tooltip de Tabler/Bootstrap. Añade los atributos data-bs-*
     y el title por defecto, dejando que el consumidor los sobrescriba (merge). --}}
<span
    {{ $attributes->merge([
        'data-bs-toggle' => 'tooltip',
        'data-bs-placement' => $position,
        'title' => $text,
    ]) }}
>
    {{ $slot }}
</span>
