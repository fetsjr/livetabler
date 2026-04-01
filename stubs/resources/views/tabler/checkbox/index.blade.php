@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'label' => null,
    'description' => null,
])

@php
    // Native Checkbox Tailwind representation matching Tabler styling
    $inputClasses = "rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 dark:border-zinc-700 dark:bg-zinc-900 dark:checked:bg-blue-600 dark:focus:ring-blue-500";
    $labelClasses = "ml-2 block text-sm font-medium text-gray-800 dark:text-gray-200 cursor-pointer select-none";
@endphp

<div class="relative flex items-start mb-2">
    <div class="flex h-5 items-center">
        <input
            type="checkbox"
            {{ $attributes->class([$inputClasses]) }}
            @if ($name) name="{{ $name }}" {{ $attributes->wire('model') }} id="{{ $name }}" @endif
        />
    </div>
    @if ($label || $slot->isNotEmpty())
        <div class="ms-3 text-sm">
            <label @if ($name) for="{{ $name }}" @endif class="{{ $labelClasses }}">
                {{ $label ?? $slot }}
            </label>
            @if ($description)
                <p class="text-gray-500 dark:text-gray-400 mt-0.5">{{ $description }}</p>
            @endif
        </div>
    @endif
</div>
