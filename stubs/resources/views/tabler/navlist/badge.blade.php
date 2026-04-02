@props([
    'color' => 'zinc',
])

@php
$colorClasses = match($color) {
    'blue' => 'bg-blue-100 text-blue-600 dark:bg-blue-500/20 dark:text-blue-300',
    'red' => 'bg-red-100 text-red-600 dark:bg-red-500/20 dark:text-red-300',
    default => 'bg-zinc-100 text-zinc-600 dark:bg-zinc-700 dark:text-zinc-300',
};
@endphp

<span {{ $attributes->class(["inline-flex items-center rounded-full px-1.5 py-0.5 text-xs font-medium $colorClasses"]) }}>
    {{ $slot }}
</span>
