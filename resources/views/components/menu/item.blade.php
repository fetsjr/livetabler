@props([
    'icon' => null,
    'href' => null,
    'danger' => false,
    'shortcut' => null,
])

@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->class(['nav-link', 'text-danger' => $danger]) }}
>
    @if ($icon)
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            {!! $icon !!}
        </span>
    @endif
    <span class="nav-link-title">
        {{ $slot }}
    </span>

    @if ($shortcut)
        <small class="ms-auto text-muted">{{ $shortcut }}</small>
    @endif
</{{ $tag }}>
