@props([
    'separator' => null,
    'icon' => null,
    'href' => null,
])

@php
$linkClasses = "text-zinc-800 dark:text-white hover:underline decoration-zinc-800/20 underline-offset-4";
$staticClasses = "text-gray-500 dark:text-white/80";
$separatorClasses = "mx-1 text-zinc-300 dark:text-white/80";
@endphp

<div {{ $attributes->class(['flex items-center text-sm font-medium group/breadcrumb']) }}>
    @if ($href)
        <a class="{{ $linkClasses }}" href="{{ $href }}">{{ $slot }}</a>
    @else
        <div class="{{ $staticClasses }}">{{ $slot }}</div>
    @endif

    <span class="{{ $separatorClasses }} group-last/breadcrumb:hidden">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
    </span>
</div>
