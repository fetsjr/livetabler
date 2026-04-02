@props([
    'checked' => false,
    'name' => null,
    'value' => null,
])

<button
    type="button"
    x-data="{ checked: @js($checked) }"
    @click="checked = !checked"
    {{ $attributes->class(['flex w-full items-center gap-2 rounded-md px-3 py-1.5 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors']) }}
>
    <span class="flex h-4 w-4 items-center justify-center rounded border border-zinc-300 dark:border-zinc-600" :class="checked ? 'bg-blue-600 border-blue-600' : ''">
        <svg x-show="checked" class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
    </span>
    <span>{{ $slot }}</span>
</button>
