@props([
    'label' => 'Select all',
])

<label {{ $attributes->class(['flex items-center gap-2 cursor-pointer']) }}>
    <input type="checkbox" class="h-4 w-4 rounded border-zinc-300 dark:border-zinc-600 text-blue-600 focus:ring-blue-500 dark:bg-zinc-800" />
    <span class="text-sm text-zinc-700 dark:text-zinc-300">{{ $label }}</span>
</label>
