@props([
    // Atributo name del textarea; también se usa como id y para la validación.
    'name' => '',
    // Número de filas visibles.
    'rows' => 4,
    // Fuerza el estado inválido aunque no haya error de validación.
    'invalid' => false,
])

@php
    // El control es inválido si se fuerza con la prop o si hay un error de validación.
    $tieneError = $invalid || ($name && isset($errors) && $errors->has($name));
@endphp

<textarea
    rows="{{ $rows }}"
    @if ($name) name="{{ $name }}" id="{{ $name }}" {{ $attributes->wire('model') }} @endif
    {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-control', 'is-invalid' => $tieneError]) }}
>{{ $slot }}</textarea>
