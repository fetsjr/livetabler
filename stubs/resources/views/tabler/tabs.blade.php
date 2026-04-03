@php
    $default = $default ?? null;
@endphp

<div 
    x-data="{ activeTab: '{{ $default }}' }" 
    {{ $attributes->class(['w-100']) }}
>
    {{ $slot }}
</div>
