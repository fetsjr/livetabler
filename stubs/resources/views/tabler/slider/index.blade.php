@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'min' => 0,
    'max' => 100,
    'step' => 1,
])

<div 
    class="relative w-full"
    x-data="{ value: @if($attributes->has('wire:model')) $wire.entangle('{{ $name }}') @elseif($attributes->has('value')) {{ $attributes->get('value') }} @else 50 @endif }"
>
    <!-- Background Track -->
    <div class="absolute inset-y-0 left-0 right-0 m-auto h-2 rounded-full bg-gray-200 dark:bg-zinc-800 pointer-events-none"></div>

    <!-- Active Track / Accent Color Fill -->
    <div 
        class="absolute inset-y-0 left-0 m-auto h-2 rounded-full bg-blue-600 dark:bg-blue-500 pointer-events-none" 
        :style="`width: ${((value - {{ $min }}) / ({{ $max }} - {{ $min }})) * 100}%`"
    ></div>

    <!-- Ticks Layer (Slots via tabler:slider.tick) -->
    <div class="absolute inset-y-0 left-0 right-0 flex justify-between mx-[1%] pointer-events-none px-1">
        {{ $slot }}
    </div>

    <!-- The Native Input Range (Styled to be transparent block with standard pseudo controls) -->
    <input 
        type="range" 
        min="{{ $min }}" 
        max="{{ $max }}" 
        step="{{ $step }}" 
        x-model="value"
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} @endif
        class="absolute inset-y-0 left-0 m-auto w-full h-2 appearance-none bg-transparent outline-none cursor-pointer
               focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-zinc-900 
               [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:bg-white [&::-webkit-slider-thumb]:border [&::-webkit-slider-thumb]:border-gray-300 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:shadow-md [&::-webkit-slider-thumb]:transition-transform [&::-webkit-slider-thumb]:hover:scale-110"
        {{ $attributes->whereDoesntStartWith('wire:model') }}
    />
</div>
