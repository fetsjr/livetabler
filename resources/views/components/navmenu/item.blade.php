@props([
    'icon' => null,
    'href' => null,
    'current' => false,
])

@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->class(['dropdown-item', 'active' => $current]) }}
>
    @if ($icon)
        <span class="dropdown-item-icon">
            {!! $icon !!}
        </span>
    @endif
    {{ $slot }}
</{{ $tag }}>
