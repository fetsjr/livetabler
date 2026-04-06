@props([
    'active' => false,
])

<button type="button" {{ $attributes->class(['btn btn-icon btn-sm btn-ghost-secondary', $active ? 'active bg-secondary-lt' : '']) }}>
    {{ $slot }}
</button>
