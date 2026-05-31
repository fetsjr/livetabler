@props([
    'variant' => null, // dots, bullets, arrows
])

@php
    $classes = 'breadcrumb';
    if ($variant) {
        $classes .= " breadcrumb-{$variant}";
    }
@endphp

<ol {{ $attributes->class([$classes]) }} aria-label="breadcrumbs">
    {{ $slot }}
</ol>
