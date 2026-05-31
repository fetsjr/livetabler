@props([
    'placeholder' => null,
    'suffix' => null,
    'max' => null,
])

<span {{ $attributes->class(['text-truncate flex-fill text-dark']) }} data-tabler-select-selected>
    @if ($placeholder)
        <span class="text-muted" data-tabler-select-placeholder>{{ $placeholder }}</span>
    @endif

    {{ $slot }}
</span>
