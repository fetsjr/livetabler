@props([
    'logo' => null, // Optional SVG or image for branding
    'name' => config('app.name', 'Tabler UI'),
    'href' => '/',
])

<a href="{{ $href }}" {{ $attributes->class(['navbar-brand navbar-brand-autodark']) }}>
    @if ($logo)
        <div class="navbar-brand-image">
            {!! $logo !!}
        </div>
    @else
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 4h6v8h-6z"></path>
            <path d="M4 16h6v4h-6z"></path>
            <path d="M14 12h6v8h-6z"></path>
            <path d="M14 4h6v5h-6z"></path>
        </svg>
    @endif
    <span class="ms-2">{{ $name }}</span>
</a>
