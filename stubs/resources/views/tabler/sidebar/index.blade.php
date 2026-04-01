@props([
    'collapsible' => false,
])

@php
    $classes = "flex flex-col bg-white dark:bg-zinc-900 w-64 min-h-dvh h-dvh max-h-dvh overflow-y-auto border-r border-gray-200 dark:border-zinc-800 transition-all duration-300";
@endphp

<aside {{ $attributes->class([$classes]) }} data-tabler-sidebar>
    <div class="flex-1 flex flex-col p-4 space-y-2">
        {{ $slot }}
    </div>
</aside>
