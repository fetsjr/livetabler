@props([
    'exclusive' => true,
])

<div 
    x-data="{ 
        activeItem: null,
        toggle(name) {
            if ('{{ $exclusive }}' == '1') {
                this.activeItem = this.activeItem === name ? null : name;
            }
        }
    }" 
    {{ $attributes->class(['accordion']) }}
>
    {{ $slot }}
</div>
