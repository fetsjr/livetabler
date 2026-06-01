@props([
    // Si es true fija la cabecera en la parte superior al hacer scroll (sticky-top).
    'sticky' => false,
])

{{-- Cabecera de página de Tabler. Fusiona las clases del consumidor en un único
     atributo class; sticky-top se añade de forma condicional con la sintaxis con clave. --}}
<div {{ $attributes->class([
    'page-header',
    'd-print-none',
    'sticky-top' => $sticky,
]) }}>
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
