@php
    $variant = $variant ?? 'info';
    $title = $title ?? null;
    $icon = $icon ?? null;
    $dismissible = $dismissible ?? false;
    $important = $important ?? false;

    $classes = 'alert';
    $classes .= " alert-{$variant}";
    
    if ($dismissible) {
        $classes .= ' alert-dismissible';
    }

    if ($important) {
        $classes .= ' alert-important';
    }

    $attributes = $attributes->class([$classes]);
@endphp

<div {{ $attributes->merge(['role' => 'alert']) }}>
    <div class="d-flex">
        @if ($icon ?? null)
            <div>
                <x-tabler::icon :name="$icon" class="alert-icon" />
            </div>
        @endif
        <div>
            @if ($title ?? null)
                <h4 class="alert-title">{{ $title }}</h4>
            @endif
            <div class="text-secondary">
                {{ $slot }}
            </div>
        </div>
    </div>
    
    @if ($dismissible ?? false)
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    @endif
</div>
