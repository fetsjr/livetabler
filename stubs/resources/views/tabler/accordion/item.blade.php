@props([
    'name' => uniqid('accordion-'),
])

<div 
    x-data="{ 
        name: '{{ $name }}', 
        get isOpen() { 
            if (typeof activeItem !== 'undefined' && activeItem !== null) return activeItem === this.name;
            return this.localOpen;
        },
        localOpen: false,
        toggleItem() {
            if (typeof toggle !== 'undefined' && typeof activeItem !== 'undefined') {
                toggle(this.name);
            } else {
                this.localOpen = !this.localOpen;
            }
        }
    }"
    {{ $attributes->class(['accordion-item']) }}
>
    {{ $slot }}
</div>
