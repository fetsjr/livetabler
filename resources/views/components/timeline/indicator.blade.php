@props([
    'variant' => 'info',
    'icon' => null,
])

@php
    $colorClass = match ($variant) {
        'success' => 'bg-success text-success-fg',
        'warning' => 'bg-warning text-warning-fg',
        'danger' => 'bg-danger text-danger-fg',
        default => 'bg-primary text-primary-fg',
    };
@endphp

<div class="timeline-event-icon {{ $colorClass }}">
    @if ($icon)
        {!! $icon !!}
    @else
        <!-- Optional: default dot if no icon -->
    @endif
</div>
