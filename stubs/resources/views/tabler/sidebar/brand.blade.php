@props([
    'href' => '/',
    'logo' => null,
])

<a href="{{ $href }}" {{ $attributes->class(['navbar-brand navbar-brand-autodark']) }}>
    @if ($logo)
        <img src="{{ $logo }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
    @endif
    {{ $slot }}
</a>
