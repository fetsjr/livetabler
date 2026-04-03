@props([
    'iconTrailing' => null,
    'variant' => 'primary', // primary, outline, ghost, link, filled, subtle
    'type' => 'button',
    'loading' => false,
    'size' => 'md',      // sm, md, lg, xl
    'square' => false,
    'pill' => false,
    'color' => null,     // blue, red, green, etc.
    'icon' => null,
    'href' => null,
    'as' => null,
])

@php
    $as = $as ?? ($href ? 'a' : 'button');

    $classes = 'btn';

    // Size
    if ($size !== 'md') {
        $classes .= " btn-{$size}";
    }

    // Shape
    if ($square) $classes .= ' btn-square';
    if ($pill) $classes .= ' btn-pill';

    // Loading
    if ($loading) $classes .= ' btn-loading';

    // Icon-only button detection
    if ($slot->isEmpty() && ($icon || $loading)) {
        $classes .= ' btn-icon';
    }

    // Color and Variant Mapping
    // Tabler logic: btn-{variant} or btn-{color}
    // If variant is 'primary' and no color is set, use 'btn-primary'
    // If variant is 'outline' and color is 'blue', use 'btn-outline-blue'
    
    $colorSuffix = $color ?? 'primary';
    
    if ($variant === 'primary' && !$color) {
        $classes .= ' btn-primary';
    } elseif ($variant === 'outline') {
        $classes .= " btn-outline-{$colorSuffix}";
    } elseif ($variant === 'ghost') {
        $classes .= " btn-ghost-{$colorSuffix}";
    } elseif ($variant === 'link') {
        $classes .= ' btn-link';
    } elseif ($variant === 'subtle') {
        // Tabler 1.x doesn't have btn-subtle by default in all variants, 
        // but often btn-ghost or btn-light is used.
        $classes .= " btn-ghost-{$colorSuffix}";
    } else {
        // Default to variant if it's a standard one (danger, success, etc.)
        $classes .= " btn-{$variant}";
    }

    $attributes = $attributes->class([$classes]);

    if ($as === 'button') {
        $attributes = $attributes->merge(['type' => $type]);
    } else {
        $attributes = $attributes->merge(['href' => $href]);
    }
@endphp

<{{ $as }} {{ $attributes }}>
    @if ($icon && !$loading)
        {!! $icon !!}
    @endif

    {{ $slot }}

    @if ($iconTrailing && !$loading)
        {!! $iconTrailing !!}
    @endif
</{{ $as }}>
