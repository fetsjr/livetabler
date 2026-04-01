@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'invalid' => false,
    'resize' => 'vertical',
    'rows' => 4,
])

@php
    $invalid = $invalid || ($name && $errors->has($name));

    // Tabler Textarea styling
    $baseClasses = "block w-full p-3 text-sm rounded-md border-gray-300 shadow-sm transition-colors focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:bg-gray-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500";

    if ($invalid) {
        $baseClasses .= " border-red-500 focus:border-red-500 focus:ring-red-500";
    }

    $resizeClasses = match($resize) {
        'none' => 'resize-none',
        'horizontal' => 'resize-x',
        'both' => 'resize',
        default => 'resize-y',
    };

    $classes = "{$baseClasses} {$resizeClasses}";
    
    // Tabler form-control equivalent in Tailwind
@endphp

<textarea
    rows="{{ $rows }}"
    {{ $attributes->class([$classes]) }}
    @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} @endif
    @if ($invalid) aria-invalid="true" @endif
>{{ $slot }}</textarea>
