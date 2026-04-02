@props([
    'open' => false,
])

<span class="ml-auto shrink-0 transition-transform duration-200" :class="{ 'rotate-180': isOpen }">
    <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
    </svg>
</span>
