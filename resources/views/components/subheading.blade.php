{{-- Subtítulo de Tabler (encabezado de cuarto nivel). No necesita props;
     fusiona las clases del consumidor sobre el estilo base. --}}
@props([])

<h4 {{ $attributes->class(['h4 mb-2']) }}>
    {{ $slot }}
</h4>
