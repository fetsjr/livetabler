{{-- Párrafo de texto secundario destacado (lead) de Tabler. No necesita props;
     fusiona las clases del consumidor sobre el estilo base. --}}
@props([])

<p {{ $attributes->class(['text-secondary lead']) }}>
    {{ $slot }}
</p>
