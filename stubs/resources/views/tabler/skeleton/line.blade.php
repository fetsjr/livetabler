@props([
    'size' => 'base',
    'animate' => null,
])

@php
$classes = 'w-full';
$classes .= match ($size) {
    'lg' => ' h-6',
    default => ' h-5',
};
$classes .= match ($animate) {
    'pulse' => ' animate-pulse',
    default => '',
};
@endphp

<div {{ $attributes->class([$classes]) }}>
    <div class="h-full rounded bg-zinc-200 dark:bg-zinc-700">{{ $slot }}</div>
</div>
