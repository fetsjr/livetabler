@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'invalid' => false,
    'size' => 'md',
])

@php
    $invalid = $invalid || ($name && $errors->has($name));

    // Base custom select styles matching Tabler
    $baseClasses = "block w-full rounded-md border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:bg-gray-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 appearance-none";

    if ($invalid) {
        $baseClasses .= " border-red-500 text-red-900 focus:border-red-500 focus:ring-red-500 dark:border-red-500 dark:text-red-400";
    }

    $sizeClasses = match($size) {
        'sm' => "py-1.5 pl-2 pr-8 text-xs",
        'lg' => "py-3 pl-4 pr-10 text-base",
        default => "py-2 pl-3 pr-9 text-sm", // md
    };

    $classes = "{$baseClasses} {$sizeClasses}";
@endphp

<div class="relative">
    <select
        @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} @endif
        @if ($invalid) aria-invalid="true" @endif
        {{ $attributes->whereDoesntStartWith('wire:model')->class([$classes]) }}
    >
        {{ $slot }}
    </select>
    
    <!-- Custom SVG chevron matching Tabler's style -->
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
        <svg class="h-4 w-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </div>
</div>
