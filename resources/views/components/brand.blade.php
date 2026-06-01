@props([
    // SVG o imagen opcional para la marca. Si es null se muestra el logo por defecto.
    'logo' => null,

    // Texto de la marca. Por defecto usa el nombre de la app (config app.name).
    'name' => config('app.name', 'Tabler UI'),

    // URL de destino del enlace de la marca.
    'href' => '/',
])

{{-- Marca/logo de la barra de navegación de Tabler. Fusiona las clases del
     consumidor en un único atributo class y aplica el href por defecto. --}}
<a {{ $attributes->class(['navbar-brand navbar-brand-autodark'])->merge(['href' => $href]) }}>
    @if ($logo)
        {{-- Logo personalizado proporcionado por el consumidor. --}}
        <div class="navbar-brand-image">
            {!! $logo !!}
        </div>
    @else
        {{-- Logo por defecto: icono "layout-dashboard" de Tabler. --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 4h6v8h-6z"></path>
            <path d="M4 16h6v4h-6z"></path>
            <path d="M14 12h6v8h-6z"></path>
            <path d="M14 4h6v5h-6z"></path>
        </svg>
    @endif
    {{-- Texto de la marca junto al logo. --}}
    <span class="ms-2">{{ $name }}</span>
</a>
