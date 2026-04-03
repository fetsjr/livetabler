@props([
    'variant' => 'light', // light, dark
])

@php
    $classes = 'navbar navbar-expand-md d-print-none';
    $classes .= " navbar-{$variant}";
@endphp

<header {{ $attributes->class([$classes]) }}>
    <div class="container-xl">
        {{ $slot }}
    </div>
</header>
