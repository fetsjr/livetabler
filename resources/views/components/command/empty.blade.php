<div
    x-show="search.length > 0 && Array.from($el.parentElement.querySelectorAll('li[role=option]')).every(el => el.style.display === 'none')"
    x-cloak
    {{ $attributes->class(['px-4 py-4 text-center small']) }}
>
    <svg class="mx-auto text-muted mb-3" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <p class="mt-3 fw-semibold text-dark mb-1">No results found</p>
    <p class="text-muted mb-0">We couldn't find anything matching "<span x-text="search" class="text-dark"></span>".</p>
</div>
