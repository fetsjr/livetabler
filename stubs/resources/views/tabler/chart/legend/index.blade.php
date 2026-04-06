@props([
    'label' => null,
    'field' => null,
    'format' => null,
])

@php
$format = is_array($format) ? \Illuminate\Support\Js::encode($format) : $format;
@endphp

<div {{ $attributes->class(['d-flex align-items-center gap-2 p-2']) }}>
    {{ $slot }}

    @if (is_string($label) && $label !== '')
        <div class="small text-muted">{{ $label }}</div>
    @elseif ($label)
        {{ $label }}
    @endif
</div>
