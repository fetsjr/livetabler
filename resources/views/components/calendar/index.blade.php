@props([
    // Mes mostrado en la franja superior (por defecto el mes actual abreviado).
    'month' => date('M'),
    // Anio asociado a la fecha (no se muestra, disponible para el consumidor).
    'year' => date('Y'),
    // Dia mostrado en grande en el cuerpo (por defecto el dia actual).
    'day' => date('d'),
])

{{-- Tarjeta de fecha (franja de mes + numero de dia grande). Fusiona clases del consumidor. --}}
<div {{ $attributes->class(['card card-sm d-inline-flex border-0 shadow-sm overflow-hidden']) }} style="width: 80px;">
    {{-- Franja superior con el mes en mayusculas. --}}
    <div class="bg-danger text-white text-center py-1 small fw-bold text-uppercase">
        {{ $month }}
    </div>
    {{-- Cuerpo con el numero de dia destacado. --}}
    <div class="card-body text-center py-2 h2 mb-0 fw-bold">
        {{ $day }}
    </div>
</div>
