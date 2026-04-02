@props([
    'align' => 'start',
    'variant' => null,
    'sticky' => false,
])

@php
$classes = "py-3 px-3 first:ps-0 last:pe-0 text-sm";

$classes .= match($align) {
    'center' => ' text-center',
    'end' => ' text-end',
    default => '',
};

$classes .= match ($variant) {
    'strong' => ' font-medium text-zinc-800 dark:text-white',
    default => ' text-zinc-500 dark:text-zinc-300',
};

if (!$sticky) {
    $classes .= ' border-t border-zinc-200 dark:border-zinc-700 first:[tr:first-child>&]:border-t-0';
}
@endphp

<td {{ $attributes->class([$classes]) }}>
    {{ $slot }}
</td>
