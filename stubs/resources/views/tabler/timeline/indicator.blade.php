@props([
    'variant' => 'info',
    'icon' => null,
])

@php
    $colorClass = match ($variant) {
        'success' => 'bg-green-100 text-green-600 dark:bg-green-500/20 dark:text-green-400 border-green-200 dark:border-green-500/30',
        'warning' => 'bg-yellow-100 text-yellow-600 dark:bg-yellow-500/20 dark:text-yellow-400 border-yellow-200 dark:border-yellow-500/30',
        'danger' => 'bg-red-100 text-red-600 dark:bg-red-500/20 dark:text-red-400 border-red-200 dark:border-red-500/30',
        default => 'bg-blue-100 text-blue-600 dark:bg-blue-500/20 dark:text-blue-400 border-blue-200 dark:border-blue-500/30',
    };
@endphp

<div class="relative z-10 flex shrink-0 items-center justify-center w-8 h-8 rounded-full border shadow-sm {{ $colorClass }}">
    <!-- Custom SVG icon, or default bullet -->
    @if ($icon)
        {!! $icon !!}
    @else
        <div class="h-2 w-2 rounded-full currentColor bg-current"></div>
    @endif
</div>
