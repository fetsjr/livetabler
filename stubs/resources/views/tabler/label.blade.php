@props([
    'badge' => null,
    'aside' => null,
    'trailing' => null,
    'srOnly' => false,
])

@php
    $baseClasses = "font-medium text-sm text-gray-800 dark:text-gray-200";
    
    // Tabler label styles typically include mb-2 standard spacing
    $baseClasses .= " inline-flex items-center mb-1.5";

    if ($srOnly) {
        $baseClasses .= " sr-only";
    }
@endphp

<label {{ $attributes->class([$baseClasses]) }} data-tabler-label>
    {{ $slot }}

    @if (is_string($badge))
        <span class="ms-1.5 text-xs text-gray-500 bg-gray-100 px-1.5 py-0.5 rounded dark:bg-zinc-800 dark:text-gray-400">
            {{ $badge }}
        </span>
    @elseif ($badge)
        <span class="ms-1.5">{{ $badge }}</span>
    @endif

    @if ($aside)
        <span class="ms-1.5 text-xs text-gray-500 bg-gray-100 px-1.5 py-0.5 rounded dark:bg-zinc-800 dark:text-gray-400">
            {{ $aside }}
        </span>
    @endif

    @if ($trailing)
        <div class="ml-auto font-normal text-xs text-gray-500 dark:text-gray-400">
            {{ $trailing }}
        </div>
    @endif
</label>
