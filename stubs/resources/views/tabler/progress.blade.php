@props([
    'value' => 0,
    'color' => 'blue', // blue, green, red, yellow, etc.
    'size' => null,   // sm, lg
    'label' => null,
])

@php
    $clampedValue = max(0, min(100, $value));
    
    $classes = 'progress';
    if ($size) {
        $classes .= " progress-{$size}";
    }
@endphp

<div {{ $attributes->class(['w-full']) }}>
    @if ($label)
        <div class="mb-2 text-sm font-medium d-flex justify-content-between">
            <span>{{ $label }}</span>
            <span>{{ $clampedValue }}%</span>
        </div>
    @endif
    <div class="{{ $classes }}">
        <div 
            class="progress-bar bg-{{ $color }}" 
            style="width: {{ $clampedValue }}%"
            role="progressbar" 
            aria-valuenow="{{ $clampedValue }}" 
            aria-valuemin="0" 
            aria-valuemax="100"
            aria-label="{{ $clampedValue }}%"
        >
            <span class="visually-hidden">{{ $clampedValue }}% Complete</span>
        </div>
    </div>
</div>
