<button
    type="button"
    x-data
    @click="$store.sidebar.open = !$store.sidebar.open"
    {{ $attributes->class(['navbar-toggler d-lg-none']) }}
    aria-label="Toggle navigation"
>
    <span class="navbar-toggler-icon"></span>
</button>
