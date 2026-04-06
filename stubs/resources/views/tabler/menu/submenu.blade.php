@props([
    'label' => null,
])

<div
    x-data="{ open: false }"
    {{ $attributes->class(['position-relative']) }}
    @mouseenter="open = true"
    @mouseleave="open = false"
>
    <tabler:menu.item @click="open = !open">
        {{ $label ?? $slot }}
        <svg class="ms-auto" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </tabler:menu.item>

    <div
        x-show="open"
        x-transition
        class="position-absolute start-100 top-0 shadow-lg border rounded-3 p-1 bg-white"
        style="z-index: 1050; min-width: 12rem; display: none;"
    >
        {{ $slot }}
    </div>
</div>
