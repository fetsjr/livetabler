@props([
    'heading' => null,
    'expandable' => false,
])

<div {{ $attributes->class(['nav-item']) }}>
    @if ($heading)
        <div class="hr-text hr-text-left text-uppercase text-secondary mt-3 mb-1 px-3" style="font-size: 0.65rem; letter-spacing: .04em;">
            {{ $heading }}
        </div>
    @endif
    <div class="d-flex flex-column">
        {{ $slot }}
    </div>
</div>
