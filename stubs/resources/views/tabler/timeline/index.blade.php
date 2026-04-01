@props([
    'horizontal' => false,
])

@php
    // Timeline root handles the list semantics. Tabler UI styles timelines cleanly.
    $classes = "relative flex flex-col gap-4";
    if ($horizontal) {
        $classes = "relative flex flex-row gap-4 overflow-x-auto pb-4";
    }
@endphp

<ol {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</ol>
