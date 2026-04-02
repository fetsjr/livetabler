@props([
    'expandable' => true,
    'expanded' => false,
    'heading' => null,
])

<div
    x-data="{ expanded: @js($expanded) }"
    {{ $attributes->class(['flex flex-col']) }}
>
    @if ($heading)
        <button
            type="button"
            @click="expanded = !expanded"
            class="flex items-center justify-between px-3 py-2 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-zinc-800 dark:hover:text-white"
        >
            <span>{{ $heading }}</span>
            <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': expanded }" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
        </button>
    @endif

    <div x-show="{{ $heading ? 'expanded' : 'true' }}" x-collapse {{ $heading ? 'style=display:none' : '' }}>
        {{ $slot }}
    </div>
</div>
