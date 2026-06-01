@props([
    // Muestra los pasos numerados (steps-counter de Tabler) en lugar de
    // mostrar los titulos.
    'counter' => false,
])

{{-- Raiz del indicador de pasos. Fusiona las clases del consumidor en un unico
     atributo class. Los pasos van en el slot como <x-tabler::steps.item>. --}}
<div {{ $attributes->class(['steps', 'steps-counter' => $counter]) }}>
    {{ $slot }}
</div>
