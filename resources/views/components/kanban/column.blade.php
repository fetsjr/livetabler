@props([
    'title' => 'Column',
])

<!-- Column container for kanban cards -->
<div 
    {{ $attributes->class(['col-auto']) }}
    style="width: 320px;"
>
    <div class="card h-100 bg-light shadow-none">
        <!-- Column Header -->
        <div class="card-header border-bottom-0 py-2">
            <h3 class="card-title fw-bold text-muted small text-uppercase">{{ $title }}</h3>
        </div>
        
        <!-- Droppable / scrollable body area -->
        <div class="card-body p-2 overflow-y-auto d-flex flex-column gap-2">
            {{ $slot }}
        </div>
    </div>
</div>
