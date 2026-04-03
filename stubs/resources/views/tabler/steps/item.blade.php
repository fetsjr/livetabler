<a href="#" {{ $attributes->class(['step-item', 'active' => $active ?? false]) }}>
    {{ $title ?? $slot }}
</a>
