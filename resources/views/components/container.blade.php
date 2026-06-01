@props([
    // Si es true usa un contenedor fluido (ancho completo) en vez de container-xl.
    'fluid' => false,
])

{{-- Contenedor centrado de Tabler. Fusiona las clases del consumidor en un único
     atributo class a través del attribute bag. --}}
<div {{ $attributes->class(['container-xl' => ! $fluid, 'container-fluid' => $fluid]) }}>
    {{ $slot }}
</div>
