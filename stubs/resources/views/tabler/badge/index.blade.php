@php
    $classes = 'badge';
    
    if ($dot ?? false) {
        $classes .= ' badge-dot';
    }

    if ($outline ?? false) {
        $classes .= ' badge-outline';
    }

    if ($pill ?? false) {
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
