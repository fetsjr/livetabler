@props([
    'placeholder' => 'Type a command or search...',
    'icon' => true,
    'clearable' => true,
])

<div class="relative flex items-center border-b border-gray-100 px-4 dark:border-zinc-800">
    @if($icon)
        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    @endif

    <!-- Alpine search binding -->
    <input 
        type="text" 
        x-model="search"
        class="flex-1 border-0 bg-transparent py-4 pl-3 pr-2 text-sm text-gray-900 outline-none focus:ring-0 placeholder:text-gray-400 dark:text-gray-100 dark:placeholder:text-gray-500"
        placeholder="{{ $placeholder }}"
        {{ $attributes }}
    />

    @if($clearable)
        <button 
            type="button" 
            x-show="search.length > 0"
            @click="search = ''; focusInput();"
            class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 rounded p-1"
            title="Clear"
        >
            <span class="sr-only">Clear search</span>
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
</div>
