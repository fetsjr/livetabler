@props([
    'container' => false,
])

@if ($container)
    <div {{ $attributes->class(['w-full mx-auto max-w-7xl px-4 sm:px-6 lg:px-8']) }}>
        {{ $slot }}
    </div>
@else
    {{ $slot }}
@endif
