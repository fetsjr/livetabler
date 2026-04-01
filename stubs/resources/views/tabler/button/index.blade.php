@props([
    'iconTrailing' => null,
    'variant' => 'primary', // primary, outline, ghost, danger, filled, subtle
    'type' => 'button',
    'loading' => false,
    'align' => 'center',
    'size' => 'md',      // sm, md (base), lg
    'square' => false,
    'color' => 'blue',   // tabler branding color
    'icon' => null,
    'href' => null,
    'as' => null,
])

@php
    $square = $square || $slot->isEmpty();
    $as = $as ?? ($href ? 'a' : 'button');

    $isTypeSubmit = $type === 'submit';

    // Base styles: Tabler commonly uses standard inline-flex with medium font weight and subtle transitions
    $baseClasses = "inline-flex items-center justify-center font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none";

    // Alignment
    $alignClasses = match($align) {
        'start' => 'justify-start',
        'end' => 'justify-end',
        default => 'justify-center',
    };

    // Sizing (Tabler sizing mapping)
    $sizeClasses = match($size) {
        'xs' => "h-6 text-xs rounded {$alignClasses} " . ($square ? 'w-6' : 'px-2'),
        'sm' => "h-8 text-sm rounded-md {$alignClasses} " . ($square ? 'w-8' : 'px-3'),
        'lg' => "h-12 text-lg rounded-md {$alignClasses} " . ($square ? 'w-12' : 'px-5'),
        'base', 'md', default => "h-10 text-sm rounded-md {$alignClasses} " . ($square ? 'w-10' : 'px-4'),
    };

    // Color definitions for standard Tabler
    $colors = [
        'blue' => [
            'primary' => 'bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600',
            'outline' => 'border border-blue-600 text-blue-600 hover:bg-blue-50 hover:text-blue-700 dark:border-blue-500 dark:text-blue-400 dark:hover:bg-blue-900/20',
            'ghost' => 'text-blue-600 hover:bg-blue-50 dark:text-blue-400 dark:hover:bg-blue-900/20',
            'filled' => 'bg-blue-50 text-blue-600 hover:bg-blue-100 dark:bg-blue-500/10 dark:text-blue-400 dark:hover:bg-blue-500/20',
            'subtle' => 'text-gray-500 hover:text-blue-600 hover:bg-blue-50 dark:text-gray-400 dark:hover:text-blue-400 dark:hover:bg-blue-500/10',
        ],
        'red' => [
            'primary' => 'bg-red-600 text-white hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600',
            'outline' => 'border border-red-600 text-red-600 hover:bg-red-50 hover:text-red-700 dark:border-red-500 dark:text-red-400 dark:hover:bg-red-900/20',
            'ghost' => 'text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20',
            'filled' => 'bg-red-50 text-red-600 hover:bg-red-100 dark:bg-red-500/10 dark:text-red-400 dark:hover:bg-red-500/20',
            'subtle' => 'text-gray-500 hover:text-red-600 hover:bg-red-50 dark:text-gray-400 dark:hover:text-red-400 dark:hover:bg-red-500/10',
        ],
        'default' => [
            'primary' => 'bg-gray-800 text-white hover:bg-gray-900 dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-white',
            'outline' => 'border border-gray-300 text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-800',
            'ghost' => 'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800',
            'filled' => 'bg-gray-100 text-gray-900 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700',
            'subtle' => 'text-gray-500 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800',
        ],
    ];

    // Mappings of variant to colors
    if ($variant === 'danger') {
        $color = 'red';
        $variant = 'primary'; // override default logic to map to redness
    }

    $colorConfig = $colors[$color] ?? $colors['default'];
    // Fallbacks if a variant isn't specifically mapped (like danger mapped back to primary red)
    if (!isset($colorConfig[$variant])) {
        // Assume default gray styles for unmapped
        $variantClasses = $colors['default'][$variant] ?? $colors['default']['outline'];
    } else {
        $variantClasses = $colorConfig[$variant];
    }

    $classes = "{$baseClasses} {$sizeClasses} {$variantClasses}";

    // Handle button attributes
    $attributes = $attributes->class([$classes]);

    if ($as === 'button') {
        $attributes = $attributes->merge(['type' => $type]);
    } else {
        $attributes = $attributes->merge(['href' => $href]);
    }
@endphp

<{{ $as }} {{ $attributes }}>
    @if ($loading)
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @elseif ($icon)
        <span class="{{ $square ? '' : 'mr-2' }} opacity-80">{!! $icon !!}</span>
    @endif

    {{ $slot }}

    @if ($iconTrailing && !$loading)
        <span class="ml-2 opacity-80">{!! $iconTrailing !!}</span>
    @endif
</{{ $as }}>
