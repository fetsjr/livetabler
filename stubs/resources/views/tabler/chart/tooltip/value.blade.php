@props([
    'label' => null,
    'field' => null,
    'format' => null,
    'prefix' => null,
    'suffix' => null,
])

@php
$format = is_array($format) ? \Illuminate\Support\Js::encode($format) : $format;
@endphp

<div {{ $attributes->class(['d-flex align-items-center gap-2 p-2 small text-muted']) }}>
    {{ $slot }}

    @if (is_string($label) && $label !== '')
        <div class="text-dark">{{ $label }}</div>
    @elseif ($label)
        {{ $label }}
    @endif

    @if ($field)
        <div class="flex-fill"></div>
        <div>{{ $prefix ?? '' }}<slot field="{{ $field }}" @if ($format) format="{{ $format }}" @endif></slot>{{ $suffix ?? '' }}</div>
    @endif
</div>
