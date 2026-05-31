<div
    x-show="open"
    x-cloak
    @click.outside="open = false"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="dropdown-menu show position-absolute w-100 shadow p-0"
    style="max-height: 15rem; overflow-y: auto; z-index: 1050;"
>
    {{ $slot }}
</div>
