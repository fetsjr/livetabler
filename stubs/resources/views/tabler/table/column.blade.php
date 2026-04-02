@props([
    'sortable' => false,
    'sorted' => false,
    'direction' => null,
    'align' => 'start',
    'sticky' => false,
])

@php
$classes = "py-3 px-3 first:ps-0 last:pe-0 text-start text-sm font-medium text-zinc-800 dark:text-white border-b border-zinc-200 dark:border-zinc-700";

$classes .= match($align) {
    'center' => ' text-center',
    'end' => ' text-end',
    default => '',
};
@endphp

<th {{ $attributes->class([$classes]) }}>
    @if ($sortable)
        <tabler:table.sortable :$sorted :$direction>
            {{ $slot }}
        </tabler:table.sortable>
    @else
        {{ $slot }}
    @endif
</th>
