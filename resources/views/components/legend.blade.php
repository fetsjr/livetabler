@props([
    // Texto de ayuda opcional debajo de la leyenda.
    'description' => null,
])

{{-- Leyenda/título de un grupo de campos (fieldset). --}}
<legend {{ $attributes->class(['form-label']) }}>
    {{ $slot }}
    @if ($description)
        <div class="form-hint">{{ $description }}</div>
    @endif
</legend>
