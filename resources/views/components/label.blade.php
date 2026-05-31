@props([
    // Texto de una insignia (badge) que se muestra junto a la etiqueta. Ej: "Opcional".
    'badge' => null,

    // Texto secundario/aclaratorio que se muestra al lado de la etiqueta.
    'aside' => null,

    // Texto alineado a la derecha (p. ej. un contador o ayuda corta).
    'trailing' => null,

    // Si es true, oculta visualmente la etiqueta pero la mantiene para lectores de pantalla.
    'srOnly' => false,
])

{{-- Etiqueta de un control de formulario. Fusiona las clases del consumidor. --}}
<label {{ $attributes->class(['form-label', 'sr-only' => $srOnly]) }}>
    {{ $slot }}

    {{-- Texto secundario --}}
    @if ($aside)
        <span class="form-label-description">{{ $aside }}</span>
    @endif

    {{-- Insignia --}}
    @if ($badge)
        <span class="badge bg-blue-lt ms-2">{{ $badge }}</span>
    @endif

    {{-- Texto a la derecha --}}
    @if ($trailing)
        <span class="float-end text-muted small">{{ $trailing }}</span>
    @endif
</label>
