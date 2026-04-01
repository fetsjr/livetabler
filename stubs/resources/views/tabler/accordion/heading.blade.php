<button 
    type="button" 
    @click="toggleItem()"
    {{ $attributes->class(['flex w-full items-center justify-between px-4 py-3 text-left font-medium text-gray-900 focus:outline-none dark:text-white hover:bg-gray-50 dark:hover:bg-zinc-800/50 transition-colors']) }}
    :aria-expanded="isOpen"
>
    <div class="flex items-center gap-2">
        {{ $slot }}
    </div>
    
    <!-- Chevrons that rotate on open -->
    <span class="ml-auto shrink-0 transition-transform duration-200" :class="{ 'rotate-180': isOpen }">
        <svg class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </span>
</button>
