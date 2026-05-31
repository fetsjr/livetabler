@props([
    'sticky' => false,
])

@php
    $classes = 'page-header d-print-none';
    if ($sticky) {
        $classes .= ' sticky-top';
    }
@endphp

<div {{ $attributes->class([$classes]) }}>
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
