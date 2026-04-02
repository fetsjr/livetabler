@props([
    'checked' => false,
])

<span {{ $attributes->class(['flex h-4 w-4 items-center justify-center rounded-full border transition-colors', $checked ? 'border-blue-600' : 'border-zinc-300 dark:border-zinc-600']) }}>
    @if ($checked)
        <span class="h-2 w-2 rounded-full bg-blue-600"></span>
    @endif
</span>
