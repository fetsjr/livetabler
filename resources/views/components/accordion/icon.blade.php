@props([
    'open' => false,
])

<span class="ms-auto flex-shrink-0 transition-transform text-muted" :class="{ 'rotate-180': isOpen }" style="transition-duration: 200ms;">
    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
    </svg>
</span>
