@props([
    'icon' => null,
    'href' => null,
    'current' => false,
    'badge' => null,
])

@php
$tag = $href ? 'a' : 'button';
$currentClasses = $current
    ? 'bg-zinc-100 dark:bg-zinc-800 text-zinc-900 dark:text-white'
    : 'text-zinc-600 dark:text-zinc-400 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 hover:text-zinc-900 dark:hover:text-white';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->class(["flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition-colors $currentClasses"]) }}
>
    @if ($icon)
        <svg class="h-5 w-5 shrink-0 opacity-60" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <use href="#icon-{{ $icon }}" />
        </svg>
    @endif

    <span class="flex-1 text-start">{{ $slot }}</span>

    @if ($badge)
        <span class="inline-flex items-center rounded-full bg-zinc-100 dark:bg-zinc-700 px-2 py-0.5 text-xs font-medium text-zinc-600 dark:text-zinc-300">
            {{ $badge }}
        </span>
    @endif
</{{ $tag }}>
