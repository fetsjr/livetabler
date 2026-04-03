@props([
    'href' => null,
])

<li {{ $attributes->class(['breadcrumb-item'])->merge(['aria-current' => !$href ? 'page' : null]) }}>
    @if ($href)
        <a href="{{ $href }}">{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</li>
