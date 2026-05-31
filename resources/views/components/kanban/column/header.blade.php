@props([
    'heading' => null,
    'subheading' => null,
    'count' => null,
    'badge' => null,
])

@php
$classes = 'p-2 d-flex flex-column';
@endphp

<div {{ $attributes->class($classes) }} data-tabler-kanban-column-header>
    <div class="d-flex align-items-center justify-content-between" style="min-height: 2rem;">
        <div class="px-3 d-flex align-items-center gap-2">
            {{ $slot }}

            @if ($heading)
                <tabler:heading>{{ $heading }}</tabler:heading>
            @endif

            @if ($count)
                <div class="small text-muted">{{ $count }}</div>
            @endif

            @if ($badge)
                <tabler:badge size="sm">{{ $badge }}</tabler:badge>
            @endif
        </div>

        <div class="d-flex align-items-center gap-1">
            {{ $actions ?? '' }}
        </div>
    </div>

    @if ($subheading)
        <div class="px-3 d-flex align-items-center gap-2 mb-1">
            <tabler:subheading>{{ $subheading }}</tabler:subheading>
        </div>
    @endif
</div>
