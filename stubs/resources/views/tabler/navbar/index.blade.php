@props([
    'variant' => 'default', // Tabler typically uses subtle/white navbars
])

@php
    $baseClasses = "flex items-center w-full min-h-[3.5rem] px-4 sm:px-6 lg:px-8 border-b border-gray-200 dark:border-zinc-800 bg-white dark:bg-zinc-900";
@endphp

<nav {{ $attributes->class([$baseClasses]) }} data-tabler-navbar>
    {{ $slot }}
</nav>
