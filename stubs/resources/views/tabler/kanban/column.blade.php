@props([
    'title' => 'Column',
])

<!-- Column container for kanban cards -->
<div 
    {{ $attributes->class(['flex flex-col shrink-0 w-80 max-h-full rounded-xl bg-gray-100/80 dark:bg-zinc-800/50 snap-start border border-gray-200 dark:border-zinc-800/80']) }}
>
    <!-- Column Header -->
    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200/50 dark:border-zinc-700/50">
        <h3 class="font-semibold text-gray-800 text-sm dark:text-gray-200">{{ $title }}</h3>
        <!-- You could render an icon or count here -->
    </div>
    
    <!-- Droppable / scrollable body area -->
    <div class="flex-1 overflow-y-auto px-4 py-3 flex flex-col gap-3">
        {{ $slot }}
    </div>
</div>
