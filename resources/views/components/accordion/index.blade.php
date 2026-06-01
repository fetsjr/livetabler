@props([
    // Identificador del grupo. Sirve como ancla para data-bs-parent de los
    // items hijos (comportamiento de acordeon exclusivo). Si no se indica, se
    // genera uno automatico para evitar colisiones entre acordeones.
    'id' => null,

    // Variante sin bordes/fondo (accordion-flush de Tabler/Bootstrap).
    'flush' => false,
])

@php
    // Id efectivo: el indicado por el consumidor o uno autogenerado unico.
    $idEfectivo = $id ?? 'acc-' . uniqid();
@endphp

{{-- Raiz del acordeon. Fusiona las clases del consumidor en un unico atributo
     class y aplica el id por merge (sobrescribible por el consumidor). --}}
<div {{ $attributes->class(['accordion', 'accordion-flush' => $flush])->merge(['id' => $idEfectivo]) }}>
    {{ $slot }}
</div>
