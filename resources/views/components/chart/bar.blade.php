@props([
    'minHeight' => null,
    'field' => 'value',
    'radius' => null,
    'width' => null,
])

<template name="bar" field="{{ $field }}" {{ $attributes->only([])->merge([
        'min-height' => $minHeight,
        'radius' => $radius,
        'width' => $width,
    ]) }}>
    <path {{ $attributes->class('text-zinc-800')->merge([
        'stroke' => 'none',
        'fill' => 'currentColor',
    ]) }}></path>
</template>
