<!-- The Kanban wrapper horizontally scrollable -->
<div 
    {{ $attributes->class(['flex overflow-x-auto overflow-y-hidden pb-4 snap-x snap-mandatory gap-6 items-start h-full min-h-[500px] w-full']) }}
    data-tabler-kanban
>
    <!-- We expect flux:kanban.column items inside -->
    {{ $slot }}
</div>
