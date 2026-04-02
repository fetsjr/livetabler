@props([
    'icon' => null,
    'href' => null,
    'current' => false,
    'badge' => null,
])

@php
$tag = $href ? 'a' : 'button';
$currentClasses = $current
    ? 'text-zinc-900 dark:text-white border-b-2 border-zinc-900 dark:border-white'
    : 'text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->class(["inline-flex items-center gap-2 px-3 py-2 text-sm font-medium transition-colors $currentClasses"]) }}
>
    {{ $slot }}

    @if ($badge)
        <tabler:navbar.badge>{{ $badge }}</tabler:navbar.badge>
    @endif
</{{ $tag }}>
