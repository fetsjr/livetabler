@props([
    'tooltip' => null,
    'summary' => null,
    'value' => null,
    'svg' => null,
])

@php
$classes = Flux::classes('block relative');
$value = is_array($value) ? \Illuminate\Support\Js::encode($value) : $value;
@endphp

<div {{ $attributes->class($classes) }} wire:ignore.children @if ($value) data-value="{{ $value }}" @endif data-flux-chart>
    {{ $slot }}
</div>
