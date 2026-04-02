@props([
    'heading' => null,
    'subheading' => null,
    'count' => null,
    'badge' => null,
])

@php
$classes = 'p-2 flex flex-col';
@endphp

<div {{ $attributes->class($classes) }} data-flux-kanban-column-header>
    <div class="flex items-center justify-between min-h-8">
        <div class="px-3 flex items-center gap-1.5">
            {{ $slot }}

            @if ($heading)
                <tabler:heading>{{ $heading }}</tabler:heading>
            @endif

            @if ($count)
                <div class="text-sm text-zinc-500 dark:text-white/70">{{ $count }}</div>
            @endif

            @if ($badge)
                <tabler:badge size="sm">{{ $badge }}</tabler:badge>
            @endif
        </div>

        <div class="flex items-center gap-1">
            {{ $actions ?? '' }}
        </div>
    </div>

    @if ($subheading)
        <div class="px-3 flex items-center gap-1.5 mb-1">
            <tabler:subheading>{{ $subheading }}</tabler:subheading>
        </div>
    @endif
</div>
