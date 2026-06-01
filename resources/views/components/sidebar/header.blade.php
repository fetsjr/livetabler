{{-- Encabezado del sidebar: fila flexible con separación a los extremos.
     Usa utilidades reales de Bootstrap 5 (d-flex, align-items-center, justify-content-between).
     Fusiona las clases del consumidor en el único class del raíz. --}}
<div {{ $attributes->class(['d-flex align-items-center justify-content-between px-3 py-3']) }}>
    {{ $slot }}
</div>
