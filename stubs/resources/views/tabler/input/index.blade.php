@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'variant' => 'default', // Tabler typically uses default/flush.
    'icon' => null,
    'iconTrailing' => null,
    'type' => 'text',
    'invalid' => false,
    'size' => 'md',
])

@php
    $invalid = $invalid || ($name && $errors->has($name));

    // Tabler UI base forms are block, w-full, standard borders, smooth radius
    $baseClasses = "block w-full rounded-md border-gray-300 shadow-sm transition-colors focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:bg-gray-50 sm:text-sm dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500";
    
    if ($invalid) {
        $baseClasses .= " border-red-500 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 dark:border-red-500 dark:text-red-400 dark:placeholder-red-500/50";
    }

    $sizeClasses = match($size) {
        'sm' => "py-1.5 px-2 text-xs",
        'lg' => "py-3 px-4 text-base",
        default => "py-2 px-3 text-sm", // Tabler default
    };

    if ($icon) {
        $sizeClasses .= " pl-9"; // add padding for leading icon
    }
    
    if ($iconTrailing) {
        $sizeClasses .= " pr-9"; // add padding for trailing icon
    }

    $classes = "{$baseClasses} {$sizeClasses}";
@endphp

<div class="relative flex w-full">
    @if ($icon)
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 dark:text-gray-500">
            {!! $icon !!}
        </div>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        @if($invalid) aria-invalid="true" @endif
        {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => $classes]) }}
        @if ($name) {{ $attributes->wire('model') }} @endif
    />

    @if ($iconTrailing)
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500">
            {!! $iconTrailing !!}
        </div>
    @endif
</div>
