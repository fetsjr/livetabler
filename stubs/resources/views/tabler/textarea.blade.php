@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'invalid' => false,
    'rows' => 4,
])

@php
    $invalid = $invalid || ($name && $errors->has($name));

    $classes = 'form-control';

    if ($invalid) {
        $classes .= ' is-invalid';
    }
@endphp

<textarea
    rows="{{ $rows }}"
    @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $name }}" @endif
    {{ $attributes->whereDoesntStartWith('wire:model')->class([$classes]) }}
>{{ $slot }}</textarea>
