@props([
    'selectedSuffix' => null,
    'placeholder' => null,
    'searchable' => null,
    'clearable' => null,
    'invalid' => null,
    'trigger' => null,
    'empty' => null,
    'clear' => null,
    'close' => null,
    'name' => null,
    'size' => null,
    'input' => null,
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
    {{ $attributes->class(['position-relative w-100']) }}
    data-tabler-pillbox
>
    @if ($trigger)
        {{ $trigger }}
    @else
        <tabler:pillbox.trigger :$placeholder :$clearable :$invalid :$size>
            <tabler:pillbox.selected :$placeholder :$size>
                <tabler:pillbox.input :$placeholder :$invalid />
            </tabler:pillbox.selected>
        </tabler:pillbox.trigger>
    @endif

    <tabler:pillbox.options :$empty>
        {{ $slot }}
    </tabler:pillbox.options>
</div>
