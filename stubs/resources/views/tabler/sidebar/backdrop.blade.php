<div
    x-show="$store.sidebar && $store.sidebar.open"
    x-transition.opacity.duration.300ms
    @click="$store.sidebar.open = false"
    class="position-fixed top-0 start-0 end-0 bottom-0 navbar-overlay"
    style="z-index: 1040; background: rgba(0,0,0,0.5); display: none;"
></div>
