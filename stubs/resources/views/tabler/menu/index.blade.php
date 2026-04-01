<nav {{ $attributes->class(['flex flex-col gap-1 w-full']) }} aria-label="Menu" data-tabler-menu>
    <!-- Use Alpine JS to manage menu item selection and active states if necessary -->
    <div class="py-1">
        {{ $slot }}
    </div>
</nav>
