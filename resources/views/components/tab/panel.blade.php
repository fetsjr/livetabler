@props([
    'name' => null, // The identifier that triggers this panel
])

<div 
    x-show="activeTab === '{{ $name }}'"
    class="tab-pane"
    :class="{ 'active show': activeTab === '{{ $name }}' }"
    :aria-hidden="activeTab !== '{{ $name }}'"
    role="tabpanel"
    {{ $attributes }}
>
    {{ $slot }}
</div>
