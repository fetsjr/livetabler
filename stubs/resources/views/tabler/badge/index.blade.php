@props([
    'variant' => 'solid', // 'solid', 'outline', 'soft'
    'rounded' => null,   // Tabler uses pill badges commonly
    'color' => 'blue',
    'size' => 'md',      // 'md', 'sm'
    'icon' => null,
    'label' => null,
])

@php
$baseClasses = "inline-flex items-center font-semibold leading-none";

$sizeClasses = match($size) {
    'sm' => 'px-1.5 py-0.5 text-[0.65rem]',
    'md' => 'px-2 py-1 text-xs',
    default => 'px-2 py-1 text-xs',
};

$roundedClasses = $rounded ? 'rounded-full' : 'rounded-md';

$colors = [
    'blue' => [
        'solid' => 'bg-blue-600 text-white dark:bg-blue-500/20 dark:text-blue-300',
        'outline' => 'border border-blue-600 text-blue-600 dark:border-blue-500 dark:text-blue-300',
        'soft' => 'bg-blue-100 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400',
    ],
    'azure' => [
        'solid' => 'bg-sky-500 text-white dark:bg-sky-500/20 dark:text-sky-300',
        'outline' => 'border border-sky-500 text-sky-500 dark:border-sky-500 dark:text-sky-300',
        'soft' => 'bg-sky-100 text-sky-600 dark:bg-sky-500/10 dark:text-sky-400',
    ],
    'red' => [
        'solid' => 'bg-red-600 text-white dark:bg-red-500/20 dark:text-red-300',
        'outline' => 'border border-red-600 text-red-600 dark:border-red-500 dark:text-red-300',
        'soft' => 'bg-red-100 text-red-600 dark:bg-red-500/10 dark:text-red-400',
    ],
    'green' => [
        'solid' => 'bg-green-600 text-white dark:bg-green-500/20 dark:text-green-300',
        'outline' => 'border border-green-600 text-green-600 dark:border-green-500 dark:text-green-300',
        'soft' => 'bg-green-100 text-green-600 dark:bg-green-500/10 dark:text-green-400',
    ],
    'yellow' => [
        'solid' => 'bg-yellow-500 text-white dark:bg-yellow-500/20 dark:text-yellow-300',
        'outline' => 'border border-yellow-500 text-yellow-600 dark:border-yellow-500 dark:text-yellow-300',
        'soft' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-500/10 dark:text-yellow-400',
    ],
    'gray' => [
        'solid' => 'bg-gray-500 text-white dark:bg-gray-500/20 dark:text-gray-300',
        'outline' => 'border border-gray-500 text-gray-600 dark:border-gray-500 dark:text-gray-300',
        'soft' => 'bg-gray-100 text-gray-600 dark:bg-gray-500/10 dark:text-gray-400',
    ],
];

$colorConfig = $colors[$color] ?? $colors['gray'];
$colorClasses = $colorConfig[$variant] ?? $colorConfig['solid'];

$classes = "{$baseClasses} {$sizeClasses} {$roundedClasses} {$colorClasses}";
@endphp

<span {{ $attributes->class([$classes]) }}>
    @if ($icon)
        <span class="mr-1 opacity-80">{{ $icon }}</span>
    @endif
    {{ $slot->isEmpty() ? $label : $slot }}
</span>
