@props([
    'name' => null,
    'trigger' => null,
    'closable' => true,
    'dismissible' => true,
])

<!-- We use a custom event listener scoped to window to manage state purely via Alpine.js -->
<div 
    x-data="{ 
        open: false,
        name: '{{ $name }}',
        toggle(eventParams) {
            if (eventParams === this.name) {
                this.open = !this.open;
            }
        },
        closeModal(eventParams) {
             if (eventParams === this.name || !eventParams) {
                this.open = false;
             }
        }
    }"
    @modal-show.window="if ($event.detail === name) open = true;"
    @modal-close.window="if ($event.detail === name) open = false;"
    @keydown.escape.window="if (open) open = false;"
    x-cloak
>
    <!-- Optional Trigger Button inside component wrapper -->
    @if ($trigger)
        <div @click="open = true" class="inline-block">
            {{ $trigger }}
        </div>
    @endif

    <!-- Overlay / Backdrop -->
    <div 
        x-show="open" 
        x-transition.opacity.duration.300ms
        class="fixed inset-0 z-50 bg-gray-900/60 backdrop-blur-sm dark:bg-black/60"
        @if($dismissible) @click="open = false" @endif
    ></div>

    <!-- Modal Content -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
        x-transition:leave="transition ease-in duration-200" 
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
    >
        <!-- Modal Dialog panel -->
        <div 
            class="relative w-full max-w-lg rounded-xl bg-white shadow-xl dark:bg-zinc-800 p-6 overscroll-contain overflow-y-auto max-h-[90dvh]"
            @click.stop
            {{ $attributes }}
        >
            <!-- Close Button -->
            @if($closable)
                <button 
                    @click="open = false" 
                    type="button" 
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 focus:outline-none dark:hover:text-gray-300"
                >
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif

            <!-- Modal Content Slot -->
            <div class="mt-2 text-zinc-900 dark:text-zinc-100">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
