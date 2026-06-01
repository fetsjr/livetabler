@props([
    // Texto pequeño encima del título (migas o sección).
    'pretitle' => null,
    // Título principal de la página.
    'title' => null,
    // Si true usa contenedor fluido (ancho completo) en vez de container-xl.
    'fluid' => false,
])

<div {{ $attributes->class(['page-header', 'd-print-none']) }}>
    <div @class(['container-xl' => ! $fluid, 'container-fluid' => $fluid])>
        <div class="row g-2 align-items-center">
            <div class="col">
                @if ($pretitle)
                    <div class="page-pretitle">{{ $pretitle }}</div>
                @endif
                @if ($title)
                    <h2 class="page-title">{{ $title }}</h2>
                @endif
            </div>
            {{-- Acciones de la página (botones) --}}
            @if ($slot->isNotEmpty())
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">{{ $slot }}</div>
                </div>
            @endif
        </div>
    </div>
</div>
