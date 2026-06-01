@props([
    // Si true, oculta visualmente el texto pero lo mantiene para lectores de pantalla.
    'srOnly' => false,
])

{{-- Texto de ayuda asociado a un campo de formulario. --}}
<div {{ $attributes->class(['form-hint', 'sr-only' => $srOnly]) }}>
    {{ $slot }}
</div>
