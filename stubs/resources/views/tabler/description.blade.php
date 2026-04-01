@props([
    'srOnly' => false,
])

@php
    $baseClasses = "text-sm text-gray-500 dark:text-gray-400 block mb-2";

    if ($srOnly) {
        $baseClasses .= " sr-only";
    }
@endphp

<div {{ $attributes->class([$baseClasses]) }} data-tabler-description>
    {{ $slot }}
</div>
