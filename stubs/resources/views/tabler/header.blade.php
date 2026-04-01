@props([
    'sticky' => false,
])

@php
    $classes = "w-full z-30 transition-shadow bg-white border-b border-gray-200 dark:bg-zinc-900 dark:border-zinc-800 flex items-center h-16 px-4 sm:px-6 lg:px-8";
    if ($sticky) {
        $classes .= " sticky top-0";
    }
@endphp

<header {{ $attributes->class([$classes]) }}>
    <div class="flex items-center justify-between w-full h-full">
        {{ $slot }}
    </div>
</header>
