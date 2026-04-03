@props([
    'tooltip' => null,
    'summary' => null,
    'value' => null,
    'svg' => null,
])

@php
    $value = is_array($value) ? \Illuminate\Support\Js::encode($value) : $value;
@endphp

<div {{ $attributes->class(['block relative']) }} wire:ignore @if ($value) data-value="{{ $value }}" @endif data-tabler-chart>
    {{ $slot }}
</div>
