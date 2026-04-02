@props([
    'accept' => null,
    'multiple' => false,
])

<div
    x-data="{ dragging: false }"
    x-on:dragover.prevent="dragging = true"
    x-on:dragleave.prevent="dragging = false"
    x-on:drop.prevent="dragging = false"
    :class="dragging ? 'border-blue-500 bg-blue-50 dark:bg-blue-500/10' : 'border-zinc-300 dark:border-zinc-600'"
    {{ $attributes->class(['flex flex-col items-center justify-center rounded-lg border-2 border-dashed p-8 text-center transition-colors cursor-pointer']) }}
>
    <svg class="h-10 w-10 text-zinc-400 mb-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>

    <div class="text-sm text-zinc-600 dark:text-zinc-400">
        {{ $slot }}
    </div>

    <input
        type="file"
        class="hidden"
        @if ($accept) accept="{{ $accept }}" @endif
        @if ($multiple) multiple @endif
    />
</div>
