@props([
    'key' => null,
    'sticky' => false,
])

@php
$classes = $sticky ? 'last:sticky last:bottom-0 last:z-20' : '';
@endphp

<tr @if ($key) wire:key="table-{{ $key }}" @endif {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</tr>
