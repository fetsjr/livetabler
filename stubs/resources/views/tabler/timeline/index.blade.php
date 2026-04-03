@props([
    'horizontal' => false,
])

<ul {{ $attributes->class(['timeline', $horizontal ? 'timeline-row' : '']) }}>
    {{ $slot }}
</ul>
