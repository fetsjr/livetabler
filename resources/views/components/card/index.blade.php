@props([
    // Tarjeta compacta (menos padding).
    'sm' => false,
    // Tarjeta apilable (para superponer un estado de fondo).
    'stacked' => false,
    // Color de Tabler para la barra de estado superior (success, danger...). Null = sin barra.
    'status' => null,
    // Título mostrado en la cabecera de la tarjeta.
    'title' => null,
])

<div {{ $attributes->class(['card', 'card-sm' => $sm, 'card-stacked' => $stacked]) }}>
    {{-- Barra de estado superior de color --}}
    @if ($status)
        <div class="card-status-top bg-{{ $status }}"></div>
    @endif

    {{-- Cabecera: se muestra si hay título, slot header o acciones --}}
    @if ($title || isset($header) || isset($actions))
        <div class="card-header">
            @if ($title)
                <h3 class="card-title">{{ $title }}</h3>
            @endif
            {{ $header ?? '' }}
            @isset($actions)
                <div class="card-actions">{{ $actions }}</div>
            @endisset
        </div>
    @endif

    {{-- Cuerpo: usa el slot 'body' si existe; si no, el contenido por defecto --}}
    @isset($body)
        <div class="card-body">{{ $body }}</div>
    @else
        {{ $slot }}
    @endisset

    {{-- Pie opcional --}}
    @isset($footer)
        <div class="card-footer">{{ $footer }}</div>
    @endisset
</div>
