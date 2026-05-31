<!-- The Kanban wrapper horizontally scrollable -->
<div 
    {{ $attributes->class(['row flex-nowrap overflow-auto pb-3 gx-3 align-items-start min-vh-50 w-100']) }}
>
    <!-- We expect flux:kanban.column items inside -->
    {{ $slot }}
</div>
