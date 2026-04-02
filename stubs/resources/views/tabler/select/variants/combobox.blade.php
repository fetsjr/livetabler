@props([
    'placeholder' => null,
    'searchable' => null,
    'clearable' => null,
    'multiple' => null,
    'invalid' => null,
    'empty' => null,
    'input' => null,
    'size' => null,
    'name' => null,
])

<div
    x-data="{
        open: false,
        value: '',
        filter: '',
    }"
    {{ $attributes->class(['relative w-full']) }}
    data-flux-select
>
    @if ($input)
        {{ $input }}
    @else
        <tabler:select.input :$placeholder :$clearable :$size />
    @endif

    <tabler:select.options :$searchable :$empty>
        {{ $slot }}
    </tabler:select.options>
</div>
