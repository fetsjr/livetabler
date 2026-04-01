<div 
    x-show="search.length > 0 && Array.from($el.parentElement.querySelectorAll('li[role=option]')).every(el => el.style.display === 'none')" 
    x-cloak
    {{ $attributes->class(['px-6 py-14 text-center text-sm sm:px-14']) }}
>
    <!-- Icon empty state -->
    <svg class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <p class="mt-4 font-semibold text-gray-900 dark:text-white">No results found</p>
    <p class="mt-2 text-gray-500 dark:text-gray-400">We couldn't find anything matching "<span x-text="search" class="text-gray-900 dark:text-gray-300"></span>".</p>
</div>
