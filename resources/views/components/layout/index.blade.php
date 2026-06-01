@props([
    // Tipo de layout. Ajusta la clase del contenedor .page:
    //  'boxed' -> layout-boxed, 'fluid' -> layout-fluid, cualquier otro -> sin modificador.
    'type' => 'vertical',
    // Texto de marca usado en el copyright por defecto del pie.
    'brand' => 'Tabler',
])

@php
    // Modificador de ancho del contenedor principal.
    $claseTipo = match ($type) {
        'boxed' => 'layout-boxed',
        'fluid' => 'layout-fluid',
        default => '',
    };
@endphp

{{-- Contenedor raíz de la página. Fusiona las clases del consumidor.
     El modificador de tipo solo se añade si existe, para no dejar espacios sobrantes. --}}
<div {{ $attributes->class(['page', $claseTipo => $claseTipo !== '']) }}>
    {{-- Barra lateral (un <x-tabler::sidebar>), opcional --}}
    {{ $sidebar ?? '' }}

    <div class="page-wrapper">
        {{-- Barra superior (un <x-tabler::navbar>), opcional --}}
        {{ $navbar ?? '' }}

        {{-- Contenido de la página (usa <x-tabler::page-header> y <x-tabler::page-body> dentro) --}}
        {{ $slot }}

        {{-- Pie de página --}}
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                @isset($footer)
                    {{ $footer }}
                @else
                    <div class="row text-center align-items-center">
                        <div class="col-12">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; {{ date('Y') }}
                                    <span class="link-secondary">{{ $brand }}</span>.
                                </li>
                            </ul>
                        </div>
                    </div>
                @endisset
            </div>
        </footer>
    </div>
</div>
