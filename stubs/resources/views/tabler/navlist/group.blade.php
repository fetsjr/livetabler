@props([
    'heading' => null,
    'expandable' => false,
])

<div {{ $attributes->class(['d-flex flex-column']) }}>
    @if ($heading)
        <div class="px-3 py-2 small fw-semibold text-uppercase text-muted" style="letter-spacing: .04em;">
            {{ $heading }}
        </div>
    @endif
    {{ $slot }}
</div>
