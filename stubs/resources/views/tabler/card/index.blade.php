@props([
    'size' => null,     // sm, md, lg
    'stacked' => false,
    'statusTop' => null, // color (blue, red, etc.)
    'statusStart' => null, // color
    'statusBottom' => null, // color
])

@php
    $classes = 'card';

    if ($size) {
        $classes .= " card-{$size}";
    }

    if ($stacked) {
        $classes .= ' card-stacked';
    }

    $attributes = $attributes->class([$classes]);
@endphp

<div {{ $attributes }}>
    @if ($statusTop)
        <div class="card-status-top bg-{{ $statusTop }}"></div>
    @endif
    @if ($statusStart)
        <div class="card-status-start bg-{{ $statusStart }}"></div>
    @endif
    @if ($statusBottom)
        <div class="card-status-bottom bg-{{ $statusBottom }}"></div>
    @endif
    
    {{ $slot }}
</div>
