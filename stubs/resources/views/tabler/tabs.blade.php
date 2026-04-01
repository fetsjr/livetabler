@props([
    'default' => null, // Default active tab id
])

<div 
    x-data="{ activeTab: '{{ $default }}' }" 
    {{ $attributes->class(['flex flex-col w-full']) }}
    data-tabler-tabs
>
    {{ $slot }}
</div>
