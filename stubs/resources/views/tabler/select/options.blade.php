@props([
    'searchable' => null,
    'search' => null,
    'empty' => null,
])

@php
$classes = Flux::classes()
    ->add('min-w-48 max-h-[14rem] p-[.3125rem] scroll-py-[.3125rem]')
    ->add('rounded-lg shadow-xs')
    ->add('border border-zinc-200 dark:border-zinc-600')
    ->add('bg-white dark:bg-zinc-700');
@endphp

@if (! $searchable)
    <div popover {{ $attributes->class($classes) }} data-flux-listbox-options>
        {{ $slot }}
    </div>
@else
    <div popover class="rounded-lg shadow-xs border border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700" data-flux-options>
        @if ($search)
            {{ $search }}
        @else
            <tabler:select.search />
        @endif

        <div class="max-h-[20rem] overflow-y-auto p-[.3125rem]">
            @if ($empty)
                {{ $empty }}
            @else
                <tabler:select.option.empty>No results found</tabler:select.option.empty>
            @endif

            {{ $slot }}
        </div>
    </div>
@endif
