@php
    $name = $name ?? '';
    $invalid = $invalid ?? false;
    $rows = $rows ?? 4;
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
