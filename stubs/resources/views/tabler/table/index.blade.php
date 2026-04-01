@props([
    'paginate' => null,
])

@php
    $containerClasses = "flex flex-col border border-gray-200 dark:border-zinc-800/60 rounded-lg bg-white dark:bg-zinc-900 overflow-hidden";
    
    // Tabler table styles: strict spacing, clear borders, white bg
    $tableClasses = "min-w-full text-left text-sm whitespace-nowrap";
@endphp

<div {{ $attributes->only('class')->class([$containerClasses]) }}>
    {{ $header ?? '' }}

    <div class="overflow-x-auto">
        <table class="{{ $tableClasses }}" {{ $attributes->except('class') }}>
            {{ $slot }}
        </table>
    </div>

    {{ $footer ?? '' }}

    @if ($paginate)
        <div class="px-4 py-3 border-t border-gray-200 dark:border-zinc-800/60 flex items-center justify-between">
            <!-- Replace this later with a dedicated tabler:pagination component as needed -->
            {{ $paginate->links() }}
        </div>
    @endif
</div>
