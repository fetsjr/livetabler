@props([
    'name' => null, // The event/id to listen to
])

<div
    x-data="{
        open: false,
        top: 0,
        left: 0,
        openMenu(e) {
            this.open = true;
            this.left = e.clientX;
            this.top = e.clientY;
            
            // Adjust bounds (basic logic)
            this.$nextTick(() => {
                const el = this.$refs.contextMenu;
                if (!el) return;
                const rect = el.getBoundingClientRect();
                if (this.left + rect.width > window.innerWidth) this.left -= rect.width;
                if (this.top + rect.height > window.innerHeight) this.top -= rect.height;
            });
        }
    }"
    @contextmenu.prevent.window="openMenu($event)"
    @click.outside="open = false"
    @keydown.escape.window="open = false"
    x-show="open"
    x-cloak
    x-ref="contextMenu"
    :style="`top: ${top}px; left: ${left}px; position: fixed;`"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    {{ $attributes->class(['z-[100] min-w-[160px] rounded-lg border border-gray-200 bg-white p-1 shadow-lg dark:border-zinc-700 dark:bg-zinc-800']) }}
>
    <!-- Use flux:menu.item inside this context wrapper generally -->
    {{ $slot }}
</div>
