@php
    $classes = 'progress';
    
    // Size logic (xs, sm, md, lg)
    if (($size ?? 'md') !== 'md') {
        $classes .= " progress-{$size}";
    }

    $barClasses = "progress-bar";
    
    if ($indeterminate ?? false) {
        $barClasses .= " progress-bar-indeterminate";
    }

    if ($variant ?? null) {
        $barClasses .= " bg-{$variant}";
    }
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <div class="{{ $barClasses }}" 
         style="width: {{ $indeterminate ? '100' : ($value ?? 0) }}%" 
         role="progressbar" 
         aria-valuenow="{{ $value ?? 0 }}" 
         aria-valuemin="0" 
         aria-valuemax="100">
        @if ($label ?? null)
            <span class="visually-hidden">{{ $label }}</span>
        @endif
    </div>
</div>
