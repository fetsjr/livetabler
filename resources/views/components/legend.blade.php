@props([
    'description' => null,
])

<legend {{ $attributes->class(['form-label']) }}>
    {{ $slot }}
    @if ($description)
        <div class="form-hint">
            {{ $description }}
        </div>
    @endif
</legend>
