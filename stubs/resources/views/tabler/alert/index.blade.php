@php
    $classes = "alert alert-{$variant}";
    
    if ($important ?? false) {
        $classes .= " alert-important";
    }
    
    if ($dismissible ?? false) {
        $classes .= " alert-dismissible";
    }
@endphp

<div {{ $attributes->merge(['class' => $classes, 'role' => 'alert']) }}>
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
