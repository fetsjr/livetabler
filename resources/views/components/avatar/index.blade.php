@php
    $classes = 'avatar';
    
    // Size logic (xs, sm, md, lg, xl)
    if (($size ?? 'md') !== 'md') {
        $classes .= " avatar-{$size}";
    }
    
    // Shape logic (rounded is default in Tabler, circle uses .avatar-rounded or .rounded-circle)
    if (($shape ?? 'rounded') === 'circle') {
        $classes .= " rounded-circle";
    }

    // Color logic (subtle light backgrounds)
    if ($color ?? null) {
        $classes .= " bg-{$color}-lt";
    }

    $attributes = $attributes->class([$classes]);
@endphp

<span {{ $attributes }} @if($src ?? null) style="background-image: url({{ $src }})" @endif>
    @if (!($src ?? null))
        @if ($icon ?? null)
            <x-tabler::icon :name="$icon" />
        @else
            {{ $initials ?? $slot }}
        @endif
    @endif

    @if ($status ?? null)
        <span class="badge bg-{{ $status }}"></span>
    @endif
</span>
