@props([
    'direction' => null,
    'sorted' => false,
])

<button type="button" {{ $attributes->class(['flex items-center gap-1 -my-1 -ms-2 -me-2 px-2 py-1 group']) }}>
    {{ $slot }}

    <div class="rounded-sm text-zinc-400 group-hover:text-zinc-800 dark:group-hover:text-white">
        @if ($sorted)
            @if ($direction === 'asc')
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
            @else
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
            @endif
        @else
            <div class="opacity-0 group-hover:opacity-100">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
            </div>
        @endif
    </div>
</button>
