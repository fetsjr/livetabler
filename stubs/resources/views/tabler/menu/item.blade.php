@props([
    'icon' => null,
    'href' => null,
    'danger' => false,
    'variant' => null,
    'shortcut' => null,
])

@php
$tag = $href ? 'a' : 'button';
$baseClasses = $danger
    ? 'text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10'
    : 'text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->class(["flex w-full items-center gap-2 rounded-md px-3 py-1.5 text-sm transition-colors $baseClasses"]) }}
>
    {{ $slot }}

    @if ($shortcut)
        <span class="ml-auto text-xs text-zinc-400 dark:text-zinc-500">{{ $shortcut }}</span>
    @endif
</{{ $tag }}>
