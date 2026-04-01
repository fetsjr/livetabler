@props([
    'name' => uniqid('accordion-'),
])

<div 
    x-data="{ 
        name: '{{ $name }}', 
        get isOpen() { 
            // If inside exclusive accordion
            if (typeof activeItem !== 'undefined') return activeItem === this.name;
            return this.localOpen;
        },
        localOpen: false,
        toggleItem() {
            if (typeof toggle !== 'undefined') {
                toggle(this.name);
            } else {
                this.localOpen = !this.localOpen;
            }
        }
    }"
    {{ $attributes->class(['border-b border-gray-200 dark:border-zinc-800 last:border-0']) }}
    data-tabler-accordion-item
>
    {{ $slot }}
</div>
