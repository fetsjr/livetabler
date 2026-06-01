@props([
    // Si true usa contenedor fluido (ancho completo) en vez de container-xl.
    'fluid' => false,
])

{{-- Zona de contenido principal de la página. El contenedor controla el ancho. --}}
<div {{ $attributes->class(['page-body']) }}>
    <div @class(['container-xl' => ! $fluid, 'container-fluid' => $fluid])>
        {{ $slot }}
    </div>
</div>
