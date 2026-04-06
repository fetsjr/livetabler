<!-- Actual task card -->
<div 
    draggable="true"
    {{ $attributes->class(['card p-3 shadow-sm transition-shadow cursor-grab mb-2']) }}
>
    {{ $slot }}
</div>
