<div class="relative w-full">
    <!-- Trigger Button that acts as the faux input box wrapping the pills -->
    <div 
        @click="open = !open"
        class="flex min-h-[38px] w-full flex-wrap items-center gap-1.5 rounded-md border border-gray-300 bg-white px-2 py-1.5 shadow-sm focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 dark:border-zinc-700 dark:bg-zinc-900 cursor-text"
    >
        <template x-if="selectedList.length === 0 && search === ''">
            <span class="text-sm text-gray-500 dark:text-gray-400 absolute ml-1 pointer-events-none" x-text="'{{ $placeholder ?? 'Select options...' }}'"></span>
        </template>
        
        {{ $slot }}
    </div>
</div>
