@props([
    'accept' => null,
    'multiple' => false,
])

<input
    type="file"
    @if ($accept) accept="{{ $accept }}" @endif
    @if ($multiple) multiple @endif
    {{ $attributes->class(['block w-full text-sm text-zinc-500 dark:text-zinc-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-zinc-100 file:text-zinc-700 dark:file:bg-zinc-700 dark:file:text-zinc-300 hover:file:bg-zinc-200 dark:hover:file:bg-zinc-600 cursor-pointer']) }}
/>
