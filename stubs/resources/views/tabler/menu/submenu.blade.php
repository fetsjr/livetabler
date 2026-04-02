@props([
    'label' => null,
])

<div
    x-data="{ open: false }"
    {{ $attributes->class(['relative']) }}
    @mouseenter="open = true"
    @mouseleave="open = false"
>
    <tabler:menu.item @click="open = !open">
        {{ $label ?? $slot }}
        <svg class="ml-auto h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
    </tabler:menu.item>

    <div
        x-show="open"
        x-transition
        class="absolute left-full top-0 z-50 ml-1 min-w-[12rem] rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 p-1 shadow-lg"
        style="display: none;"
    >
        {{ $slot }}
    </div>
</div>
