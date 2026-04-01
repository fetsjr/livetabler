@props([
    'value' => 0,
    'color' => 'blue', // blue, green, red, yellow, etc.
    'size' => 'md',
    'label' => null,
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'h-1.5',
        'lg' => 'h-4',
        default => 'h-2', // md
    };

    $colorClasses = match ($color) {
        'green' => 'bg-green-500 dark:bg-green-400',
        'red' => 'bg-red-500 dark:bg-red-400',
        'yellow' => 'bg-yellow-500 dark:bg-yellow-400',
        default => 'bg-blue-500 dark:bg-blue-400',
    };
    
    $clampedValue = max(0, min(100, $value));
@endphp

<div {{ $attributes->class(['w-full']) }}>
    @if ($label)
        <div class="flex items-center justify-between mb-1.5">
            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $label }}</span>
            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $clampedValue }}%</span>
        </div>
    @endif
    <div class="w-full bg-gray-200 rounded-full dark:bg-zinc-800 {{ $sizeClasses }} overflow-hidden">
        <div 
            class="{{ $colorClasses }} {{ $sizeClasses }} rounded-full transition-all duration-300 ease-in-out" 
            style="width: {{ $clampedValue }}%"
            role="progressbar" 
            aria-valuenow="{{ $clampedValue }}" 
            aria-valuemin="0" 
            aria-valuemax="100"
        ></div>
    </div>
</div>
