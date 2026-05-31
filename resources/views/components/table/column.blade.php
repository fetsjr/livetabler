@props([
    'sortable' => false,
    'sorted' => false,
    'direction' => null,
    'align' => 'start',
    'sticky' => false,
])

@php
    $classes = "text-{$align} fw-bold text-uppercase text-secondary";
@endphp

<th {{ $attributes->class([$classes]) }} style="font-size: 0.65rem;">
    @if ($sortable)
        <x-tabler::table.sortable :$sorted :direction="$direction">
            {{ $slot }}
        </x-tabler::table.sortable>
    @else
        {{ $slot }}
    @endif
</th>
