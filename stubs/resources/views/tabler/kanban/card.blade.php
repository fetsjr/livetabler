<!-- Actual task card -->
<div 
    draggable="true"
    {{ $attributes->class(['cursor-grab active:cursor-grabbing p-4 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-700 rounded-lg shadow-sm hover:shadow-md transition-shadow group']) }}
>
    {{ $slot }}
</div>
