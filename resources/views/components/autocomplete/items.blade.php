<ul
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 translate-y-1"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="dropdown-menu show position-absolute w-100 shadow-lg p-0"
    style="max-height: 15rem; overflow-y: auto; z-index: 1050;"
    role="listbox"
>
    {{ $slot }}
</ul>
