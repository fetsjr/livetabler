@props([
    // Bolsa de errores a consultar (por defecto 'default').
    'bag' => 'default',
    // Mensaje explícito a mostrar (tiene prioridad sobre el de validación).
    'message' => null,
    // Campo cuyo error de validación se mostrará si no se pasa 'message'.
    'name' => null,
])

@php
    // Obtenemos el mensaje de forma robusta: si $errors no está compartido (render aislado),
    // no fallamos y simplemente no hay mensaje.
    $bolsa = isset($errors) ? $errors->getBag($bag) : null;
    $mensaje = $message ?? ($name && $bolsa ? $bolsa->first($name) : null);

    // Si no hubo coincidencia exacta, probamos con campos anidados (name.*).
    if ($name && $bolsa && ($mensaje === null || $mensaje === '')) {
        $mensaje = $bolsa->first($name.'.*');
    }
@endphp

{{-- Muestra el mensaje de error de validación de un campo. Se oculta si no hay error. --}}
<div role="alert" {{ $attributes->class(['mt-1', 'small', 'text-danger', 'd-block' => $mensaje, 'd-none' => ! $mensaje]) }} data-tabler-error>
    @if ($mensaje){{ $mensaje }}@endif
</div>
