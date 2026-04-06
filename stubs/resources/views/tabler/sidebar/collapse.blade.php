@props([
    'expandable' => true,
    'expanded' => false,
    'heading' => null,
])

<div
    x-data="{ expanded: @js($expanded) }"
    {{ $attributes->class(['d-flex flex-column']) }}
>
    @if ($heading)
        <button
            type="button"
            @click="expanded = !expanded"
            class="d-flex align-items-center justify-content-between px-3 py-2 small fw-medium text-muted border-0 bg-transparent w-100 text-start"
        >
            <span>{{ $heading }}</span>
            <svg :class="{ 'rotate-180': expanded }" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="transition: transform 0.2s;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
    @endif

    <div x-show="{{ $heading ? 'expanded' : 'true' }}" x-collapse {{ $heading ? 'style=display:none' : '' }}>
        {{ $slot }}
    </div>
</div>
