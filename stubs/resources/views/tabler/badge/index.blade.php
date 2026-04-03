@php
    $variant = $variant ?? 'primary';
    $dot = $dot ?? false;
    $outline = $outline ?? false;
    $pill = $pill ?? false;
    $icon = $icon ?? null;
    $label = $label ?? '';

    $classes = 'badge';
    
    if ($dot) {
        $classes .= ' badge-dot';
    }

    if ($outline) {
        $classes .= ' badge-outline';
    }

    if ($pill) {
        $classes .= ' badge-pill';
    }

    // Default color logic
    $classes .= " bg-{$variant}";

    $attributes = $attributes->class([$classes]);
@endphp

<span {{ $attributes }}>
    @if ($icon ?? null)
        <x-tabler::icon :name="$icon" class="me-1" />
    @endif
    
    {{ $slot->isEmpty() ? ($label ?? '') : $slot }}
</span>
