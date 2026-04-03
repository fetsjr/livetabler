@props([
    'default' => null, // Default active tab id
])

<div 
    x-data="{ activeTab: '{{ $default }}' }" 
    {{ $attributes->class(['w-100']) }}
>
    {{ $slot }}
</div>
