@php
    $classes = 'btn';

    // Size
    if ($size !== 'md') {
        $classes .= " btn-{$size}";
    }

    // Shape
    if ($square ?? false) $classes .= ' btn-square';
    if ($pill ?? false) $classes .= ' btn-pill';

    // Loading
    if ($loading ?? false) $classes .= ' btn-loading disabled';

    // Icon-only button detection (if slot is empty)
    $hasSlot = $slot->isNotEmpty();
    if (!$hasSlot && ($icon || $loading)) {
        $classes .= ' btn-icon';
    }

    // Color and Variant Mapping
    // Tabler logic: btn-{variant} or btn-{color}
    if (($variant ?? 'primary') === 'primary' && !($color ?? null)) {
        $classes .= ' btn-primary';
    } elseif (($variant ?? '') === 'outline') {
        $classes .= ' btn-outline-' . ($color ?? 'primary');
    } elseif (($variant ?? '') === 'ghost') {
        $classes .= ' btn-ghost-' . ($color ?? 'primary');
    } elseif (($variant ?? '') === 'link') {
        $classes .= ' btn-link';
    } else {
        $classes .= ' btn-' . ($variant ?? 'primary');
    }

    $attributes = $attributes->class([$classes]);

    if ($as === 'button') {
        $attributes = $attributes->merge(['type' => $type ?? 'button']);
    } else {
        $attributes = $attributes->merge(['href' => $href ?? '#']);
    }
@endphp

<{{ $as }} {{ $attributes }}>
    @if ($icon && !($loading ?? false))
        <x-tabler::icon :name="$icon" class="{{ $hasSlot ? 'me-2' : '' }}" />
    @endif

    {{ $slot }}

    @if (($iconTrailing ?? null) && !($loading ?? false))
        <x-tabler::icon :name="$iconTrailing" class="{{ $hasSlot ? 'ms-2' : '' }}" />
    @endif
</{{ $as }}>
