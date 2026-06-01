@props([
    // Fija la barra arriba al hacer scroll.
    'sticky' => false,
    // Permite que el contenido se solape con la barra (navbar-overlap).
    'overlap' => false,
    // Tema de color: 'light' u 'dark'.
    'theme' => 'light',
    // URL del logo. Si es null se muestra el texto de 'brand'.
    'logo' => null,
    // Texto de la marca cuando no hay logo.
    'brand' => 'Tabler',
])

<header {{ $attributes->class([
    'navbar', 'navbar-expand-md',
    'sticky-top' => $sticky,
    'navbar-overlap' => $overlap,
    'navbar-light' => $theme === 'light',
    'navbar-dark' => $theme === 'dark',
])->merge(['data-bs-theme' => $theme]) }}>
    <div class="container-xl">
        {{-- Botón hamburguesa para móvil --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Marca / logo --}}
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/">
                @if ($logo)
                    <img src="{{ $logo }}" width="110" height="32" alt="{{ $brand }}" class="navbar-brand-image">
                @else
                    {{ $brand }}
                @endif
            </a>
        </h1>

        {{-- Zona derecha (perfil, notificaciones) --}}
        <div class="navbar-nav flex-row order-md-last">
            {{ $profile ?? '' }}
        </div>

        {{-- Menú colapsable con los items de navegación --}}
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    {{ $slot }}
                </ul>
            </div>
        </div>
    </div>
</header>
