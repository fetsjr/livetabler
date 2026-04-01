<!-- Render actual visual badges/pills inside the trigger box -->
<template x-for="item in selectedList" :key="item.val">
    <span class="inline-flex items-center gap-1 overflow-hidden sm:max-w-xs rounded-full border border-gray-200 bg-gray-50 px-2 py-0.5 text-xs font-semibold text-gray-700 dark:border-zinc-700 dark:bg-zinc-800 dark:text-gray-300">
        <span class="truncate" x-text="item.text"></span>
        <button 
            type="button" 
            @click.stop="removeSelection(item.val)" 
            class="-mr-1 shrink-0 p-0.5 rounded-full hover:bg-gray-200 text-gray-500 hover:text-gray-700 dark:hover:bg-zinc-700 dark:hover:text-gray-300 focus:outline-none"
        >
            <span class="sr-only">Remove</span>
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </span>
</template>
