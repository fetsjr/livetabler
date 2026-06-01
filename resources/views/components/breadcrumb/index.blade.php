@props([
    // Array asociativo [texto => url] para generar el rastro de migas
    // automáticamente. El último elemento se marca como activo (página actual).
    // Por defecto [] para que el bucle nunca falle si no se pasan items.
    'items' => [],
])

{{-- Raíz <ol> de Tabler. Fusiona las clases del consumidor (p. ej.
     breadcrumb-arrows / breadcrumb-dots) en un único atributo class. --}}
<ol {{ $attributes->class(['breadcrumb']) }}>
    {{-- Items generados a partir del array asociativo. El último es la página
         actual (activo, sin enlace); los anteriores van enlazados. --}}
    @foreach ($items as $label => $url)
        @if ($loop->last)
            <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
        @else
            <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
        @endif
    @endforeach

    {{-- Items manuales vía <x-tabler::breadcrumb.item>. --}}
    {{ $slot }}
</ol>
