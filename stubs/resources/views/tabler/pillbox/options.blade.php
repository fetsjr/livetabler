<div 
    x-show="open" 
    x-cloak
    @click.outside="open = false"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 translate-y-1 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="absolute mt-1 w-full max-h-60 overflow-y-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm z-50 dark:bg-zinc-800 dark:ring-white/10"
>
    <!-- Options loop inside -->
    {{ $slot }}
</div>
