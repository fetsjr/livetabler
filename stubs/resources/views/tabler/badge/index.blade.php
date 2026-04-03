@props([
    'variant' => 'solid', // 'solid', 'outline', 'soft'
    'pill' => false,
    'color' => 'blue',
    'size' => 'md',      // 'md', 'sm', 'lg'
    'icon' => null,
    'label' => null,
])

@php
    $classes = 'badge';

    // Size
    if ($size !== 'md') {
        $classes .= " badge-{$size}";
    }

    // Shape
    if ($pill) {
        $classes .= ' badge-pill';
    }

    // Variant and Color
    if ($variant === 'outline') {
        $classes .= " badge-outline text-{$color}";
    } elseif ($variant === 'soft') {
        $classes .= " bg-{$color}-lt";
    } else {
        // solid
        $classes .= " bg-{$color} text-white";
    }

    $attributes = $attributes->class([$classes]);
@endphp

<span {{ $attributes }}>
    @if ($icon)
        {!! $icon !!}
    @endif

    {{ $slot->isEmpty() ? $label : $slot }}
</span>
