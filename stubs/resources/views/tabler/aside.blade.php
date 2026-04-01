@props([
    'sticky' => false,
])

@php
    $classes = "w-64 flex-shrink-0";
    if ($sticky) {
        $classes .= " sticky top-0 max-h-screen overflow-y-auto";
    }
@endphp

<div {{ $attributes->class([$classes]) }} data-tabler-aside>
    {{ $slot }}
</div>
