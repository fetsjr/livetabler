@props([
    'placeholder' => null,
    'suffix' => null,
    'max' => null,
])

<span {{ $attributes->class(['text-truncate flex-fill text-dark']) }} data-flux-select-selected>
    @if ($placeholder)
        <span class="text-muted" data-flux-select-placeholder>{{ $placeholder }}</span>
    @endif

    {{ $slot }}
</span>
