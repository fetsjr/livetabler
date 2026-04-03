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
    {{ $attributes->class(['dropdown-menu show shadow-lg']) }}
    style="z-index: 1050; min-width: 160px;"
>
    {{ $slot }}
</div>
