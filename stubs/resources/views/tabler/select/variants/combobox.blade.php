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
    {{ $attributes->class(['position-relative w-100']) }}
    data-tabler-select
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
