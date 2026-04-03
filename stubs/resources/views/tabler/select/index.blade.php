@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'invalid' => false,
    'size' => null, // sm, lg
])

@php
    $invalid = $invalid || ($name && $errors->has($name));

    $classes = 'form-select';

    if ($size) {
        $classes .= " form-select-{$size}";
    }

    if ($invalid) {
        $classes .= ' is-invalid';
    }
@endphp

<select
    @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $name }}" @endif
    {{ $attributes->whereDoesntStartWith('wire:model')->class([$classes]) }}
>
    {{ $slot }}
</select>
