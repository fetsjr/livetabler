@props([
    'variant' => 'info', // info, success, warning, danger
    'icon' => null,
])

@php
    $variant = match ($variant) {
        'danger' => 'danger',
        'warning' => 'warning',
        'success' => 'success',
        default => 'info',
    };
@endphp

<div {{ $attributes->class(["alert alert-{$variant}"]) }} role="alert">
    <div class="d-flex">
        @if ($icon)
            <div class="pe-3">
                {!! $icon !!}
            </div>
        @endif
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
