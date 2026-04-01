@props([
    'variant' => 'block',
])

@php
// Tabler uses a block margin bottom of 1rem for form groups naturally
$baseClasses = "min-w-0 mb-4 form-group";

$variantClasses = match ($variant) {
    'bare' => 'mb-0',
    'inline' => 'mb-4 flex items-center justify-between gap-3',
    default => 'mb-4 block',
};

$classes = "{$baseClasses} {$variantClasses}";
@endphp

<div {{ $attributes->class([$classes]) }} data-tabler-field>
    {{ $slot }}
</div>
