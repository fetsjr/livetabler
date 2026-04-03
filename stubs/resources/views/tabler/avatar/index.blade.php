@props([
    'initials' => null,
    'circle' => false,
    'color' => null,
    'badge' => null, // color
    'name' => null,
    'icon' => null,
    'size' => 'md',
    'src' => null,
    'href' => null,
    'as' => null,
])

@php
    $as = $as ?? ($href ? 'a' : 'span');

    if ($name && !$initials) {
        $parts = explode(' ', trim($name));
        if (count($parts) > 1) {
            $initials = strtoupper(mb_substr($parts[0], 0, 1) . mb_substr($parts[count($parts) - 1], 0, 1));
        } else {
            $initials = strtoupper(mb_substr($parts[0], 0, 2));
        }
    }

    $classes = 'avatar';

    if ($size !== 'md') {
        $classes .= " avatar-{$size}";
    }

    if ($circle) {
        $classes .= ' avatar-rounded';
    }

    if ($color) {
        $classes .= " bg-{$color}-lt";
    }

    $attributes = $attributes->class([$classes]);

    if ($as === 'a') {
        $attributes = $attributes->merge(['href' => $href]);
    }
@endphp

<{{ $as }} {{ $attributes }} @if($src) style="background-image: url({{ $src }})" @endif>
    @if (!$src)
        @if ($icon)
            {!! $icon !!}
        @else
            {{ $initials ?? $slot }}
        @endif
    @endif

    @if ($badge)
        <span class="badge bg-{{ $badge }}"></span>
    @endif
</{{ $as }}>
