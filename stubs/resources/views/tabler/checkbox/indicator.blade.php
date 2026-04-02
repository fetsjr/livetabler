@props([
    'checked' => false,
])

<span {{ $attributes->class(['flex h-4 w-4 items-center justify-center rounded border transition-colors', $checked ? 'bg-blue-600 border-blue-600' : 'border-zinc-300 dark:border-zinc-600']) }}>
    @if ($checked)
        <svg class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
    @endif
</span>
