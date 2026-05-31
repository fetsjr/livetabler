@props([
    'text' => null,
    'position' => 'top', // top, bottom, left, right
])

<span 
    {{ $attributes->merge([
        'data-bs-toggle' => 'tooltip',
        'data-bs-placement' => $position,
        'title' => $text
    ]) }}
>
    {{ $slot }}
</span>
