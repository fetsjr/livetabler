@props([
    'placeholder' => 'Select time...',
])

<input
    type="text"
    readonly
    placeholder="{{ $placeholder }}"
    {{ $attributes->class(['block w-full rounded-md border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm text-zinc-800 dark:text-zinc-200 placeholder-zinc-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none cursor-pointer']) }}
/>
