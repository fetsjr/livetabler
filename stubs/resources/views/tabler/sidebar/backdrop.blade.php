<div
    x-show="$store.sidebar && $store.sidebar.open"
    x-transition.opacity.duration.300ms
    @click="$store.sidebar.open = false"
    class="fixed inset-0 z-40 bg-gray-900/60 backdrop-blur-sm lg:hidden"
    style="display: none;"
></div>
