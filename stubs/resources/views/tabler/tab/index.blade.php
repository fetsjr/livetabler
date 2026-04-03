@props([
    'name' => null, // The identifier for this tab
])

<li class="nav-item">
    <button 
        type="button" 
        @click="activeTab = '{{ $name }}'"
        class="nav-link"
        :class="{ 'active': activeTab === '{{ $name }}' }"
        {{ $attributes }}
        role="tab"
        :aria-selected="activeTab === '{{ $name }}'"
    >
        {{ $slot }}
    </button>
</li>
