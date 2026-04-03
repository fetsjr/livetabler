@props([
    'align' => 'start',
    'variant' => null,
    'sticky' => false,
])

@php
    $classes = "text-{$align}";
    
    if ($variant === 'strong') {
        $classes .= ' fw-bold text-dark';
    } else {
        $classes .= ' text-secondary';
    }
@endphp

<td {{ $attributes->class([$classes]) }}>
    <div class="small">
        {{ $slot }}
    </div>
</td>
