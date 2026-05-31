@props([
    'icon' => null,
    'href' => null,
    'current' => false,
    'badge' => null,
])

@php
$tag = $href ? 'a' : 'button';
$currentClasses = $current
    ? 'text-dark border-bottom border-dark border-2 fw-semibold'
    : 'text-muted';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->class(["nav-link d-inline-flex align-items-center gap-2 small fw-medium $currentClasses"]) }}
>
    {{ $slot }}

    @if ($badge)
        <tabler:navbar.badge>{{ $badge }}</tabler:navbar.badge>
    @endif
</{{ $tag }}>
