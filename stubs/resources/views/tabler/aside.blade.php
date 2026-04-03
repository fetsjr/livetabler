@props([
    'sticky' => false,
])

<aside {{ $attributes->class(['w-64 flex-shrink-0', $sticky ? 'sticky-top overflow-y-auto max-vh-100' : '']) }}>
    {{ $slot }}
</aside>
