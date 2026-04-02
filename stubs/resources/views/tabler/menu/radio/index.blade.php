@props([
    'checked' => false,
    'name' => null,
    'value' => null,
])

<button
    type="button"
    {{ $attributes->class(['flex w-full items-center gap-2 rounded-md px-3 py-1.5 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 transition-colors']) }}
>
    <span class="flex h-4 w-4 items-center justify-center rounded-full border border-zinc-300 dark:border-zinc-600 {{ $checked ? 'border-blue-600' : '' }}">
        @if ($checked)
            <span class="h-2 w-2 rounded-full bg-blue-600"></span>
        @endif
    </span>
    <span>{{ $slot }}</span>
</button>
