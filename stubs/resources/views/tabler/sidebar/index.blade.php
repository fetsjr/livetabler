<aside @class([
    'navbar navbar-vertical navbar-expand-lg',
    'navbar-dark' => ($theme ?? 'dark') === 'dark',
    'navbar-light' => ($theme ?? 'dark') === 'light',
]) data-bs-theme="{{ $theme ?? 'dark' }}">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="/">
                @if ($logo ?? null)
                    <img src="{{ $logo }}" width="110" height="32" alt="{{ $brand ?? 'Tabler' }}" class="navbar-brand-image">
                @else
                    {{ $brand ?? 'Tabler' }}
                @endif
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                {{ $slot }}
            </ul>
        </div>
    </div>
</aside>
