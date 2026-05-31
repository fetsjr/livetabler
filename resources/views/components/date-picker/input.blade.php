@props([
    'placeholder' => 'Select date...',
])

<input
    type="text"
    readonly
    placeholder="{{ $placeholder }}"
    {{ $attributes->class(['form-control cursor-pointer']) }}
/>
