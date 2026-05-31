@props([
    'placeholder' => 'Select time...',
])

<input
    type="text"
    readonly
    placeholder="{{ $placeholder }}"
    {{ $attributes->class(['form-control cursor-pointer']) }}
/>
