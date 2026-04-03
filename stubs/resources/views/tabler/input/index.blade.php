@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'icon' => null,
    'iconTrailing' => null,
    'type' => 'text',
    'invalid' => false,
    'size' => null, // sm, lg
])

@php
    $invalid = $invalid || ($name && $errors->has($name));

    $classes = 'form-control';
    
    if ($invalid) {
        $classes .= ' is-invalid';
    }

    if ($size) {
        $classes .= " form-control-{$size}";
    }

    $hasIcon = $icon || $iconTrailing;
@endphp

@if ($hasIcon)
    <div class="input-icon">
        @if ($icon)
            <span class="input-icon-addon">
                {!! $icon !!}
            </span>
        @endif

        <input
            type="{{ $type }}"
            @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $name }}" @endif
            {{ $attributes->whereDoesntStartWith('wire:model')->class([$classes]) }}
        />

        @if ($iconTrailing)
            <span class="input-icon-addon">
                {!! $iconTrailing !!}
            </span>
        @endif
    </div>
@else
    <input
        type="{{ $type }}"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $name }}" @endif
        {{ $attributes->whereDoesntStartWith('wire:model')->class([$classes]) }}
    />
@endif
