@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'min' => 0,
    'max' => 100,
    'step' => 1,
])

<div 
    class="w-100 position-relative"
    x-data="{ value: @if($attributes->has('wire:model')) $wire.entangle('{{ $name }}') @elseif($attributes->has('value')) {{ $attributes->get('value') }} @else 50 @endif }"
>
    <!-- Background Track (Tabler standard form-range is usually sufficient, but we keep slots for ticks) -->
    <div class="position-absolute w-100 top-50 translate-middle-y d-flex justify-content-between px-1 pointer-events-none" style="z-index: 1;">
        {{ $slot }}
    </div>

    <!-- The Native Input Range -->
    <input 
        type="range" 
        min="{{ $min }}" 
        max="{{ $max }}" 
        step="{{ $step }}" 
        x-model="value"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} @endif
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-range']) }}
        style="position: relative; z-index: 2;"
    />
</div>
