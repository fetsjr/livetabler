@props([
    // Tema de color del sidebar: 'dark' (por defecto) o 'light'.
    'theme' => 'dark',
    // URL del logo. Si es null se muestra el texto de 'brand'.
    'logo' => null,
    // Texto de la marca cuando no hay logo.
    'brand' => 'Tabler',
])

<aside {{ $attributes->class([
    'navbar', 'navbar-vertical', 'navbar-expand-lg',
    'navbar-dark' => $theme === 'dark',
    'navbar-light' => $theme === 'light',
])->merge(['data-bs-theme' => $theme]) }}>
    <div class="container-fluid">
        {{-- Botón hamburguesa para móvil --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Marca / logo --}}
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="/">
                @if ($logo)
                    <img src="{{ $logo }}" width="110" height="32" alt="{{ $brand }}" class="navbar-brand-image">
                @else
                    {{ $brand }}
                @endif
            </a>
        </h1>

        {{-- Menú colapsable con los items de navegación --}}
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                {{ $slot }}
            </ul>
        </div>
    </div>
</aside>
