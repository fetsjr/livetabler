@props([
    'exclusive' => true, // If true, only one accordion item can be open at a time
])

<div 
    x-data="{ 
        activeItem: null,
        toggle(name) {
            if ('{{ $exclusive }}' == '1') {
                this.activeItem = this.activeItem === name ? null : name;
            } else {
                // Not exclusive means items handle their own state, 
                // but we map it via Alpine events or isolated component scopes.
                // For simplicity in Tabler UI we'll default to isolated scope if exclusive is false.
            }
        }
    }" 
    {{ $attributes->class(['w-full border border-gray-200 rounded-lg bg-white overflow-hidden dark:bg-zinc-900 dark:border-zinc-800']) }}
    data-tabler-accordion
>
    {{ $slot }}
</div>
