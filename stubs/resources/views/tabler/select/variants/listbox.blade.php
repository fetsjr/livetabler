@props([
    'selectedSuffix' => null,
    'placeholder' => null,
    'searchable' => null,
    'clearable' => null,
    'invalid' => null,
    'trigger' => null,
    'button' => null,
    'search' => null,
    'empty' => null,
    'clear' => null,
    'close' => null,
    'name' => null,
    'size' => null,
])

<div
    x-data="{
        open: false,
        value: '',
        toggle() { this.open = !this.open; },
    }"
    {{ $attributes->class(['relative w-full']) }}
    data-flux-select
>
    @if ($trigger ?? $button)
        {{ $trigger ?? $button }}
    @else
        <tabler:select.button :$placeholder :$clearable :$invalid :$size />
    @endif

    <tabler:select.options :$search :$searchable :$empty>
        {{ $slot }}
    </tabler:select.options>
</div>
