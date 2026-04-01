@props([
    'variant' => 'info', // info, success, warning, danger
    'icon' => null,
])

@php
    $baseClasses = "rounded-lg p-4 border flex items-start gap-4";

    $variantClasses = match ($variant) {
        'success' => 'bg-green-50/50 border-green-200 text-green-900 dark:bg-green-500/10 dark:border-green-500/30 dark:text-green-300',
        'warning' => 'bg-yellow-50/50 border-yellow-200 text-yellow-900 dark:bg-yellow-500/10 dark:border-yellow-500/30 dark:text-yellow-300',
        'danger' => 'bg-red-50/50 border-red-200 text-red-900 dark:bg-red-500/10 dark:border-red-500/30 dark:text-red-300',
        default => 'bg-blue-50/50 border-blue-200 text-blue-900 dark:bg-blue-500/10 dark:border-blue-500/30 dark:text-blue-300',
    };

    $iconColorClasses = match ($variant) {
        'success' => 'text-green-500 dark:text-green-400',
        'warning' => 'text-yellow-500 dark:text-yellow-400',
        'danger' => 'text-red-500 dark:text-red-400',
        default => 'text-blue-500 dark:text-blue-400',
    };
@endphp

<div {{ $attributes->class([$baseClasses, $variantClasses]) }} role="alert">
    @if ($icon)
        <div class="shrink-0 {{ $iconColorClasses }}">
            {!! $icon !!}
        </div>
    @endif
    <div class="flex-1 text-sm leading-relaxed">
        {{ $slot }}
    </div>
</div>
