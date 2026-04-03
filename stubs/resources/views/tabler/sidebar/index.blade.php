@props([
    'variant' => 'dark', // light, dark
])

@php
    $classes = "navbar navbar-vertical navbar-expand-lg navbar-{$variant}";
@endphp

<aside {{ $attributes->class([$classes]) }}>
    <div class="container-fluid">
        {{ $slot }}
    </div>
</aside>
