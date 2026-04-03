@php
    $sticky = $sticky ?? false;
    $overlap = $overlap ?? false;
    $theme = $theme ?? 'light';
    $logo = $logo ?? null;
    $brand = $brand ?? 'Tabler';
@endphp

<header @class([
    'navbar navbar-expand-md',
    'sticky-top' => $sticky,
    'navbar-overlap' => $overlap,
    'navbar-light' => $theme === 'light',
    'navbar-dark' => $theme === 'dark',
]) data-bs-theme="{{ $theme }}">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/">
                @if ($logo ?? null)
                    <img src="{{ $logo }}" width="110" height="32" alt="{{ $brand ?? 'Tabler' }}" class="navbar-brand-image">
                @else
                    {{ $brand ?? 'Tabler' }}
                @endif
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <!-- Espacio para perfil y notificaciones -->
            {{ $profile ?? '' }}
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    {{ $slot }}
                </ul>
            </div>
        </div>
    </div>
</header>
