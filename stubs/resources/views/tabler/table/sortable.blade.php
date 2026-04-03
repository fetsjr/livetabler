@props([
    'direction' => null,
    'sorted' => false,
])

<div {{ $attributes->class(['table-sort', 'asc' => $sorted && $direction === 'asc', 'desc' => $sorted && $direction === 'desc']) }}>
    {{ $slot }}
</div>
