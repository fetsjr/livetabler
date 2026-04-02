@props([
    'active' => false,
])

<button type="button" {{ $attributes->class(['inline-flex items-center justify-center h-8 w-8 rounded text-sm text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors', $active ? 'bg-zinc-100 dark:bg-zinc-700 text-zinc-900 dark:text-white' : '']) }}>
    {{ $slot }}
</button>
