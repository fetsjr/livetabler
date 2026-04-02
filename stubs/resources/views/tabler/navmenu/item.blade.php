@props([
    'icon' => null,
    'href' => null,
    'current' => false,
])

@php
$tag = $href ? 'a' : 'button';
$currentClasses = $current
    ? 'text-zinc-900 dark:text-white font-semibold'
    : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->class(["inline-flex items-center gap-2 px-3 py-1.5 text-sm transition-colors $currentClasses"]) }}
>
    {{ $slot }}
</{{ $tag }}>
