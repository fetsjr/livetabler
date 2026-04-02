@props([
    'selectedSuffix' => null,
    'placeholder' => null,
    'searchable' => true,
    'clearable' => null,
    'invalid' => null,
    'trigger' => null,
    'search' => null,
    'empty' => null,
    'clear' => null,
    'close' => null,
    'name' => null,
    'size' => null,
])

<div
    x-data="{
        selected: [],
        open: false,
        filter: '',
        toggle(value) {
            if (this.selected.includes(value)) {
                this.selected = this.selected.filter(v => v !== value);
            } else {
                this.selected.push(value);
            }
        },
        isSelected(value) { return this.selected.includes(value); },
    }"
    {{ $attributes->class(['relative w-full']) }}
    data-flux-pillbox
>
    @if ($trigger)
        {{ $trigger }}
    @else
        <tabler:pillbox.trigger :$placeholder :$clearable :$invalid :$size />
    @endif

    <tabler:pillbox.options :$search :$searchable :$empty>
        {{ $slot }}
    </tabler:pillbox.options>
</div>
